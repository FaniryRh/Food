<?php

namespace App\Http\Controllers\Admin;

use App\CommandesSimple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCommandesSimplesRequest;
use App\Http\Requests\Admin\UpdateCommandesSimplesRequest;

class CommandesSimplesController extends Controller
{
    /**
     * Display a listing of CommandesSimple.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('commandes_simple_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('commandes_simple_delete')) {
                return abort(401);
            }
            $commandes_simples = CommandesSimple::onlyTrashed()->get();
        } else {
            $commandes_simples = CommandesSimple::all();
        }

        return view('admin.commandes_simples.index', compact('commandes_simples'));
    }

    /**
     * Show the form for creating new CommandesSimple.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('commandes_simple_create')) {
            return abort(401);
        }
        
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_cmds = \App\EtatCommande::get()->pluck('designation_etatcom', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_livraisons = \App\EtatLivraison::get()->pluck('designation_etatlivraison', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.commandes_simples.create', compact('users', 'etat_cmds', 'etat_livraisons'));
    }

    /**
     * Store a newly created CommandesSimple in storage.
     *
     * @param  \App\Http\Requests\StoreCommandesSimplesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommandesSimplesRequest $request)
    {
        if (! Gate::allows('commandes_simple_create')) {
            return abort(401);
        }
        $commandes_simple = CommandesSimple::create($request->all());

        foreach ($request->input('inventaires_simples', []) as $data) {
            $commandes_simple->inventaires_simples()->create($data);
        }


        return redirect()->route('admin.commandes_simples.index');
    }


    /**
     * Show the form for editing CommandesSimple.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('commandes_simple_edit')) {
            return abort(401);
        }
        
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_cmds = \App\EtatCommande::get()->pluck('designation_etatcom', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_livraisons = \App\EtatLivraison::get()->pluck('designation_etatlivraison', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $commandes_simple = CommandesSimple::findOrFail($id);

        return view('admin.commandes_simples.edit', compact('commandes_simple', 'users', 'etat_cmds', 'etat_livraisons'));
    }

    /**
     * Update CommandesSimple in storage.
     *
     * @param  \App\Http\Requests\UpdateCommandesSimplesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandesSimplesRequest $request, $id)
    {
        if (! Gate::allows('commandes_simple_edit')) {
            return abort(401);
        }
        $commandes_simple = CommandesSimple::findOrFail($id);
        $commandes_simple->update($request->all());

        $inventairesSimples           = $commandes_simple->inventaires_simples;
        $currentInventairesSimpleData = [];
        foreach ($request->input('inventaires_simples', []) as $index => $data) {
            if (is_integer($index)) {
                $commandes_simple->inventaires_simples()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentInventairesSimpleData[$id] = $data;
            }
        }
        foreach ($inventairesSimples as $item) {
            if (isset($currentInventairesSimpleData[$item->id])) {
                $item->update($currentInventairesSimpleData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.commandes_simples.index');
    }


    /**
     * Display CommandesSimple.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('commandes_simple_view')) {
            return abort(401);
        }
        
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_cmds = \App\EtatCommande::get()->pluck('designation_etatcom', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_livraisons = \App\EtatLivraison::get()->pluck('designation_etatlivraison', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$inventaires_simples = \App\InventairesSimple::where('cmd_simpl_id', $id)->get();

        $commandes_simple = CommandesSimple::findOrFail($id);

        return view('admin.commandes_simples.show', compact('commandes_simple', 'inventaires_simples'));
    }


    /**
     * Remove CommandesSimple from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('commandes_simple_delete')) {
            return abort(401);
        }
        $commandes_simple = CommandesSimple::findOrFail($id);
        $commandes_simple->delete();

        return redirect()->route('admin.commandes_simples.index');
    }

    /**
     * Delete all selected CommandesSimple at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('commandes_simple_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CommandesSimple::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore CommandesSimple from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('commandes_simple_delete')) {
            return abort(401);
        }
        $commandes_simple = CommandesSimple::onlyTrashed()->findOrFail($id);
        $commandes_simple->restore();

        return redirect()->route('admin.commandes_simples.index');
    }

    /**
     * Permanently delete CommandesSimple from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('commandes_simple_delete')) {
            return abort(401);
        }
        $commandes_simple = CommandesSimple::onlyTrashed()->findOrFail($id);
        $commandes_simple->forceDelete();

        return redirect()->route('admin.commandes_simples.index');
    }
}
