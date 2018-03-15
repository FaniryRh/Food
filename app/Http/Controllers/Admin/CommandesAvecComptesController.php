<?php

namespace App\Http\Controllers\Admin;

use App\CommandesAvecCompte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCommandesAvecComptesRequest;
use App\Http\Requests\Admin\UpdateCommandesAvecComptesRequest;

class CommandesAvecComptesController extends Controller
{
    /**
     * Display a listing of CommandesAvecCompte.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('commandes_avec_compte_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('commandes_avec_compte_delete')) {
                return abort(401);
            }
            $commandes_avec_comptes = CommandesAvecCompte::onlyTrashed()->get();
        } else {
            $commandes_avec_comptes = CommandesAvecCompte::all();
        }

        return view('admin.commandes_avec_comptes.index', compact('commandes_avec_comptes'));
    }

    /**
     * Show the form for creating new CommandesAvecCompte.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('commandes_avec_compte_create')) {
            return abort(401);
        }
        
        $comptes = \App\Compte::get()->pluck('nom_compte', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_cmds = \App\EtatCommande::get()->pluck('designation_etatcom', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $typepayements = \App\Typepayement::get()->pluck('designation_typepayement', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_livraisons = \App\EtatLivraison::get()->pluck('designation_etatlivraison', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.commandes_avec_comptes.create', compact('comptes', 'users', 'etat_cmds', 'typepayements', 'etat_livraisons'));
    }

    /**
     * Store a newly created CommandesAvecCompte in storage.
     *
     * @param  \App\Http\Requests\StoreCommandesAvecComptesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommandesAvecComptesRequest $request)
    {
        if (! Gate::allows('commandes_avec_compte_create')) {
            return abort(401);
        }
        $commandes_avec_compte = CommandesAvecCompte::create($request->all());

        foreach ($request->input('inventaires_avec_comptes', []) as $data) {
            $commandes_avec_compte->inventaires_avec_comptes()->create($data);
        }


        return redirect()->route('admin.commandes_avec_comptes.index');
    }


    /**
     * Show the form for editing CommandesAvecCompte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('commandes_avec_compte_edit')) {
            return abort(401);
        }
        
        $comptes = \App\Compte::get()->pluck('nom_compte', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_cmds = \App\EtatCommande::get()->pluck('designation_etatcom', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $typepayements = \App\Typepayement::get()->pluck('designation_typepayement', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_livraisons = \App\EtatLivraison::get()->pluck('designation_etatlivraison', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $commandes_avec_compte = CommandesAvecCompte::findOrFail($id);

        return view('admin.commandes_avec_comptes.edit', compact('commandes_avec_compte', 'comptes', 'users', 'etat_cmds', 'typepayements', 'etat_livraisons'));
    }

    /**
     * Update CommandesAvecCompte in storage.
     *
     * @param  \App\Http\Requests\UpdateCommandesAvecComptesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandesAvecComptesRequest $request, $id)
    {
        if (! Gate::allows('commandes_avec_compte_edit')) {
            return abort(401);
        }
        $commandes_avec_compte = CommandesAvecCompte::findOrFail($id);
        $commandes_avec_compte->update($request->all());

        $inventairesAvecComptes           = $commandes_avec_compte->inventaires_avec_comptes;
        $currentInventairesAvecCompteData = [];
        foreach ($request->input('inventaires_avec_comptes', []) as $index => $data) {
            if (is_integer($index)) {
                $commandes_avec_compte->inventaires_avec_comptes()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentInventairesAvecCompteData[$id] = $data;
            }
        }
        foreach ($inventairesAvecComptes as $item) {
            if (isset($currentInventairesAvecCompteData[$item->id])) {
                $item->update($currentInventairesAvecCompteData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.commandes_avec_comptes.index');
    }


    /**
     * Display CommandesAvecCompte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('commandes_avec_compte_view')) {
            return abort(401);
        }
        
        $comptes = \App\Compte::get()->pluck('nom_compte', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_cmds = \App\EtatCommande::get()->pluck('designation_etatcom', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $typepayements = \App\Typepayement::get()->pluck('designation_typepayement', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $etat_livraisons = \App\EtatLivraison::get()->pluck('designation_etatlivraison', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$inventaires_avec_comptes = \App\InventairesAvecCompte::where('cmd_compt_id', $id)->get();

        $commandes_avec_compte = CommandesAvecCompte::findOrFail($id);

        return view('admin.commandes_avec_comptes.show', compact('commandes_avec_compte', 'inventaires_avec_comptes'));
    }


    /**
     * Remove CommandesAvecCompte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('commandes_avec_compte_delete')) {
            return abort(401);
        }
        $commandes_avec_compte = CommandesAvecCompte::findOrFail($id);
        $commandes_avec_compte->delete();

        return redirect()->route('admin.commandes_avec_comptes.index');
    }

    /**
     * Delete all selected CommandesAvecCompte at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('commandes_avec_compte_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CommandesAvecCompte::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore CommandesAvecCompte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('commandes_avec_compte_delete')) {
            return abort(401);
        }
        $commandes_avec_compte = CommandesAvecCompte::onlyTrashed()->findOrFail($id);
        $commandes_avec_compte->restore();

        return redirect()->route('admin.commandes_avec_comptes.index');
    }

    /**
     * Permanently delete CommandesAvecCompte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('commandes_avec_compte_delete')) {
            return abort(401);
        }
        $commandes_avec_compte = CommandesAvecCompte::onlyTrashed()->findOrFail($id);
        $commandes_avec_compte->forceDelete();

        return redirect()->route('admin.commandes_avec_comptes.index');
    }
}
