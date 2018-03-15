<?php

namespace App\Http\Controllers\Admin;

use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProduitsRequest;
use App\Http\Requests\Admin\UpdateProduitsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ProduitsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Produit.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('produit_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('produit_delete')) {
                return abort(401);
            }
            $produits = Produit::onlyTrashed()->get();
        } else {
            $produits = Produit::all();
        }

        return view('admin.produits.index', compact('produits'));
    }

    /**
     * Show the form for creating new Produit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('produit_create')) {
            return abort(401);
        }
        
        $categories = \App\Categorie::get()->pluck('designation', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $option_ids = \App\Option::get()->pluck('designation_option', 'id');


        return view('admin.produits.create', compact('categories', 'option_ids'));
    }

    /**
     * Store a newly created Produit in storage.
     *
     * @param  \App\Http\Requests\StoreProduitsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduitsRequest $request)
    {
        if (! Gate::allows('produit_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $produit = Produit::create($request->all());
        $produit->option_id()->sync(array_filter((array)$request->input('option_id')));



        return redirect()->route('admin.produits.index');
    }


    /**
     * Show the form for editing Produit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('produit_edit')) {
            return abort(401);
        }
        
        $categories = \App\Categorie::get()->pluck('designation', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $option_ids = \App\Option::get()->pluck('designation_option', 'id');


        $produit = Produit::findOrFail($id);

        return view('admin.produits.edit', compact('produit', 'categories', 'option_ids'));
    }

    /**
     * Update Produit in storage.
     *
     * @param  \App\Http\Requests\UpdateProduitsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduitsRequest $request, $id)
    {
        if (! Gate::allows('produit_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $produit = Produit::findOrFail($id);
        $produit->update($request->all());
        $produit->option_id()->sync(array_filter((array)$request->input('option_id')));



        return redirect()->route('admin.produits.index');
    }


    /**
     * Display Produit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('produit_view')) {
            return abort(401);
        }
        
        $categories = \App\Categorie::get()->pluck('designation', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $option_ids = \App\Option::get()->pluck('designation_option', 'id');
$inventaires_simples = \App\InventairesSimple::where('produit_id', $id)->get();$inventaires_avec_comptes = \App\InventairesAvecCompte::where('produit_id', $id)->get();

        $produit = Produit::findOrFail($id);

        return view('admin.produits.show', compact('produit', 'inventaires_simples', 'inventaires_avec_comptes'));
    }


    /**
     * Remove Produit from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('produit_delete')) {
            return abort(401);
        }
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('admin.produits.index');
    }

    /**
     * Delete all selected Produit at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('produit_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Produit::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Produit from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('produit_delete')) {
            return abort(401);
        }
        $produit = Produit::onlyTrashed()->findOrFail($id);
        $produit->restore();

        return redirect()->route('admin.produits.index');
    }

    /**
     * Permanently delete Produit from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('produit_delete')) {
            return abort(401);
        }
        $produit = Produit::onlyTrashed()->findOrFail($id);
        $produit->forceDelete();

        return redirect()->route('admin.produits.index');
    }
}
