<?php

namespace App\Http\Controllers\Admin;

use App\EtatCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEtatCommandesRequest;
use App\Http\Requests\Admin\UpdateEtatCommandesRequest;

class EtatCommandesController extends Controller
{
    /**
     * Display a listing of EtatCommande.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('etat_commande_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('etat_commande_delete')) {
                return abort(401);
            }
            $etat_commandes = EtatCommande::onlyTrashed()->get();
        } else {
            $etat_commandes = EtatCommande::all();
        }

        return view('admin.etat_commandes.index', compact('etat_commandes'));
    }

    /**
     * Show the form for creating new EtatCommande.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('etat_commande_create')) {
            return abort(401);
        }
        return view('admin.etat_commandes.create');
    }

    /**
     * Store a newly created EtatCommande in storage.
     *
     * @param  \App\Http\Requests\StoreEtatCommandesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtatCommandesRequest $request)
    {
        if (! Gate::allows('etat_commande_create')) {
            return abort(401);
        }
        $etat_commande = EtatCommande::create($request->all());



        return redirect()->route('admin.etat_commandes.index');
    }


    /**
     * Show the form for editing EtatCommande.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('etat_commande_edit')) {
            return abort(401);
        }
        $etat_commande = EtatCommande::findOrFail($id);

        return view('admin.etat_commandes.edit', compact('etat_commande'));
    }

    /**
     * Update EtatCommande in storage.
     *
     * @param  \App\Http\Requests\UpdateEtatCommandesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtatCommandesRequest $request, $id)
    {
        if (! Gate::allows('etat_commande_edit')) {
            return abort(401);
        }
        $etat_commande = EtatCommande::findOrFail($id);
        $etat_commande->update($request->all());



        return redirect()->route('admin.etat_commandes.index');
    }


    /**
     * Display EtatCommande.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('etat_commande_view')) {
            return abort(401);
        }
        $commandes_simples = \App\CommandesSimple::where('etat_cmd_id', $id)->get();$commandes_avec_comptes = \App\CommandesAvecCompte::where('etat_cmd_id', $id)->get();

        $etat_commande = EtatCommande::findOrFail($id);

        return view('admin.etat_commandes.show', compact('etat_commande', 'commandes_simples', 'commandes_avec_comptes'));
    }


    /**
     * Remove EtatCommande from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('etat_commande_delete')) {
            return abort(401);
        }
        $etat_commande = EtatCommande::findOrFail($id);
        $etat_commande->delete();

        return redirect()->route('admin.etat_commandes.index');
    }

    /**
     * Delete all selected EtatCommande at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('etat_commande_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = EtatCommande::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore EtatCommande from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('etat_commande_delete')) {
            return abort(401);
        }
        $etat_commande = EtatCommande::onlyTrashed()->findOrFail($id);
        $etat_commande->restore();

        return redirect()->route('admin.etat_commandes.index');
    }

    /**
     * Permanently delete EtatCommande from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('etat_commande_delete')) {
            return abort(401);
        }
        $etat_commande = EtatCommande::onlyTrashed()->findOrFail($id);
        $etat_commande->forceDelete();

        return redirect()->route('admin.etat_commandes.index');
    }
}
