<?php

namespace App\Http\Controllers\Admin;

use App\Typepayement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTypepayementsRequest;
use App\Http\Requests\Admin\UpdateTypepayementsRequest;

class TypepayementsController extends Controller
{
    /**
     * Display a listing of Typepayement.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('typepayement_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('typepayement_delete')) {
                return abort(401);
            }
            $typepayements = Typepayement::onlyTrashed()->get();
        } else {
            $typepayements = Typepayement::all();
        }

        return view('admin.typepayements.index', compact('typepayements'));
    }

    /**
     * Show the form for creating new Typepayement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('typepayement_create')) {
            return abort(401);
        }
        return view('admin.typepayements.create');
    }

    /**
     * Store a newly created Typepayement in storage.
     *
     * @param  \App\Http\Requests\StoreTypepayementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypepayementsRequest $request)
    {
        if (! Gate::allows('typepayement_create')) {
            return abort(401);
        }
        $typepayement = Typepayement::create($request->all());



        return redirect()->route('admin.typepayements.index');
    }


    /**
     * Show the form for editing Typepayement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('typepayement_edit')) {
            return abort(401);
        }
        $typepayement = Typepayement::findOrFail($id);

        return view('admin.typepayements.edit', compact('typepayement'));
    }

    /**
     * Update Typepayement in storage.
     *
     * @param  \App\Http\Requests\UpdateTypepayementsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypepayementsRequest $request, $id)
    {
        if (! Gate::allows('typepayement_edit')) {
            return abort(401);
        }
        $typepayement = Typepayement::findOrFail($id);
        $typepayement->update($request->all());



        return redirect()->route('admin.typepayements.index');
    }


    /**
     * Display Typepayement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('typepayement_view')) {
            return abort(401);
        }
        $commandes_avec_comptes = \App\CommandesAvecCompte::where('typepayement_id', $id)->get();

        $typepayement = Typepayement::findOrFail($id);

        return view('admin.typepayements.show', compact('typepayement', 'commandes_avec_comptes'));
    }


    /**
     * Remove Typepayement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('typepayement_delete')) {
            return abort(401);
        }
        $typepayement = Typepayement::findOrFail($id);
        $typepayement->delete();

        return redirect()->route('admin.typepayements.index');
    }

    /**
     * Delete all selected Typepayement at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('typepayement_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Typepayement::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Typepayement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('typepayement_delete')) {
            return abort(401);
        }
        $typepayement = Typepayement::onlyTrashed()->findOrFail($id);
        $typepayement->restore();

        return redirect()->route('admin.typepayements.index');
    }

    /**
     * Permanently delete Typepayement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('typepayement_delete')) {
            return abort(401);
        }
        $typepayement = Typepayement::onlyTrashed()->findOrFail($id);
        $typepayement->forceDelete();

        return redirect()->route('admin.typepayements.index');
    }
}
