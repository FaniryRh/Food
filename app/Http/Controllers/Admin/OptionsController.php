<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOptionsRequest;
use App\Http\Requests\Admin\UpdateOptionsRequest;

class OptionsController extends Controller
{
    /**
     * Display a listing of Option.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('option_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('option_delete')) {
                return abort(401);
            }
            $options = Option::onlyTrashed()->get();
        } else {
            $options = Option::all();
        }

        return view('admin.options.index', compact('options'));
    }

    /**
     * Show the form for creating new Option.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('option_create')) {
            return abort(401);
        }
        return view('admin.options.create');
    }

    /**
     * Store a newly created Option in storage.
     *
     * @param  \App\Http\Requests\StoreOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionsRequest $request)
    {
        if (! Gate::allows('option_create')) {
            return abort(401);
        }
        $option = Option::create($request->all());



        return redirect()->route('admin.options.index');
    }


    /**
     * Show the form for editing Option.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('option_edit')) {
            return abort(401);
        }
        $option = Option::findOrFail($id);

        return view('admin.options.edit', compact('option'));
    }

    /**
     * Update Option in storage.
     *
     * @param  \App\Http\Requests\UpdateOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionsRequest $request, $id)
    {
        if (! Gate::allows('option_edit')) {
            return abort(401);
        }
        $option = Option::findOrFail($id);
        $option->update($request->all());



        return redirect()->route('admin.options.index');
    }


    /**
     * Display Option.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('option_view')) {
            return abort(401);
        }
        $inventaires_simples = \App\InventairesSimple::whereHas('options',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$inventaires_avec_comptes = \App\InventairesAvecCompte::whereHas('options',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$produits = \App\Produit::whereHas('option_id',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $option = Option::findOrFail($id);

        return view('admin.options.show', compact('option', 'inventaires_simples', 'inventaires_avec_comptes', 'produits'));
    }


    /**
     * Remove Option from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('option_delete')) {
            return abort(401);
        }
        $option = Option::findOrFail($id);
        $option->delete();

        return redirect()->route('admin.options.index');
    }

    /**
     * Delete all selected Option at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('option_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Option::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Option from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('option_delete')) {
            return abort(401);
        }
        $option = Option::onlyTrashed()->findOrFail($id);
        $option->restore();

        return redirect()->route('admin.options.index');
    }

    /**
     * Permanently delete Option from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('option_delete')) {
            return abort(401);
        }
        $option = Option::onlyTrashed()->findOrFail($id);
        $option->forceDelete();

        return redirect()->route('admin.options.index');
    }
}
