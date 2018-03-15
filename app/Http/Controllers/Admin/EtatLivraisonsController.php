<?php

namespace App\Http\Controllers\Admin;

use App\EtatLivraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEtatLivraisonsRequest;
use App\Http\Requests\Admin\UpdateEtatLivraisonsRequest;

class EtatLivraisonsController extends Controller
{
    /**
     * Display a listing of EtatLivraison.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('etat_livraison_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('etat_livraison_delete')) {
                return abort(401);
            }
            $etat_livraisons = EtatLivraison::onlyTrashed()->get();
        } else {
            $etat_livraisons = EtatLivraison::all();
        }

        return view('admin.etat_livraisons.index', compact('etat_livraisons'));
    }

    /**
     * Show the form for creating new EtatLivraison.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('etat_livraison_create')) {
            return abort(401);
        }
        return view('admin.etat_livraisons.create');
    }

    /**
     * Store a newly created EtatLivraison in storage.
     *
     * @param  \App\Http\Requests\StoreEtatLivraisonsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtatLivraisonsRequest $request)
    {
        if (! Gate::allows('etat_livraison_create')) {
            return abort(401);
        }
        $etat_livraison = EtatLivraison::create($request->all());



        return redirect()->route('admin.etat_livraisons.index');
    }


    /**
     * Show the form for editing EtatLivraison.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('etat_livraison_edit')) {
            return abort(401);
        }
        $etat_livraison = EtatLivraison::findOrFail($id);

        return view('admin.etat_livraisons.edit', compact('etat_livraison'));
    }

    /**
     * Update EtatLivraison in storage.
     *
     * @param  \App\Http\Requests\UpdateEtatLivraisonsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtatLivraisonsRequest $request, $id)
    {
        if (! Gate::allows('etat_livraison_edit')) {
            return abort(401);
        }
        $etat_livraison = EtatLivraison::findOrFail($id);
        $etat_livraison->update($request->all());



        return redirect()->route('admin.etat_livraisons.index');
    }


    /**
     * Display EtatLivraison.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('etat_livraison_view')) {
            return abort(401);
        }
        $commandes_simples = \App\CommandesSimple::where('etat_livraison_id', $id)->get();$commandes_avec_comptes = \App\CommandesAvecCompte::where('etat_livraison_id', $id)->get();

        $etat_livraison = EtatLivraison::findOrFail($id);

        return view('admin.etat_livraisons.show', compact('etat_livraison', 'commandes_simples', 'commandes_avec_comptes'));
    }


    /**
     * Remove EtatLivraison from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('etat_livraison_delete')) {
            return abort(401);
        }
        $etat_livraison = EtatLivraison::findOrFail($id);
        $etat_livraison->delete();

        return redirect()->route('admin.etat_livraisons.index');
    }

    /**
     * Delete all selected EtatLivraison at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('etat_livraison_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = EtatLivraison::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore EtatLivraison from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('etat_livraison_delete')) {
            return abort(401);
        }
        $etat_livraison = EtatLivraison::onlyTrashed()->findOrFail($id);
        $etat_livraison->restore();

        return redirect()->route('admin.etat_livraisons.index');
    }

    /**
     * Permanently delete EtatLivraison from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('etat_livraison_delete')) {
            return abort(401);
        }
        $etat_livraison = EtatLivraison::onlyTrashed()->findOrFail($id);
        $etat_livraison->forceDelete();

        return redirect()->route('admin.etat_livraisons.index');
    }
}
