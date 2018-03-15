<?php

namespace App\Http\Controllers\Admin;

use App\InventairesAvecCompte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInventairesAvecComptesRequest;
use App\Http\Requests\Admin\UpdateInventairesAvecComptesRequest;
use Yajra\DataTables\DataTables;

class InventairesAvecComptesController extends Controller
{
    /**
     * Display a listing of InventairesAvecCompte.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('inventaires_avec_compte_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = InventairesAvecCompte::query();
            $query->with("cmd_compt");
            $query->with("produit");
            $query->with("options");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('inventaires_avec_compte_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'inventaires_avec_comptes.id',
                'inventaires_avec_comptes.cmd_compt_id',
                'inventaires_avec_comptes.produit_id',
                'inventaires_avec_comptes.quantite',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'inventaires_avec_compte_';
                $routeKey = 'admin.inventaires_avec_comptes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('cmd_compt.date_depot_cmd', function ($row) {
                return $row->cmd_compt ? $row->cmd_compt->date_depot_cmd : '';
            });
            $table->editColumn('produit.designation_produit', function ($row) {
                return $row->produit ? $row->produit->designation_produit : '';
            });
            $table->editColumn('options.designation_option', function ($row) {
                if(count($row->options) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->options->pluck('designation_option')->toArray()) . '</span>';
            });
            $table->editColumn('quantite', function ($row) {
                return $row->quantite ? $row->quantite : '';
            });

            $table->rawColumns(['actions','massDelete','options.designation_option']);

            return $table->make(true);
        }

        return view('admin.inventaires_avec_comptes.index');
    }

    /**
     * Show the form for creating new InventairesAvecCompte.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('inventaires_avec_compte_create')) {
            return abort(401);
        }
        
        $cmd_compts = \App\CommandesAvecCompte::get()->pluck('date_depot_cmd', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $produits = \App\Produit::get()->pluck('designation_produit', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $options = \App\Option::get()->pluck('designation_option', 'id');


        return view('admin.inventaires_avec_comptes.create', compact('cmd_compts', 'produits', 'options'));
    }

    /**
     * Store a newly created InventairesAvecCompte in storage.
     *
     * @param  \App\Http\Requests\StoreInventairesAvecComptesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventairesAvecComptesRequest $request)
    {
        if (! Gate::allows('inventaires_avec_compte_create')) {
            return abort(401);
        }
        $inventaires_avec_compte = InventairesAvecCompte::create($request->all());
        $inventaires_avec_compte->options()->sync(array_filter((array)$request->input('options')));



        return redirect()->route('admin.inventaires_avec_comptes.index');
    }


    /**
     * Show the form for editing InventairesAvecCompte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('inventaires_avec_compte_edit')) {
            return abort(401);
        }
        
        $cmd_compts = \App\CommandesAvecCompte::get()->pluck('date_depot_cmd', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $produits = \App\Produit::get()->pluck('designation_produit', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $options = \App\Option::get()->pluck('designation_option', 'id');


        $inventaires_avec_compte = InventairesAvecCompte::findOrFail($id);

        return view('admin.inventaires_avec_comptes.edit', compact('inventaires_avec_compte', 'cmd_compts', 'produits', 'options'));
    }

    /**
     * Update InventairesAvecCompte in storage.
     *
     * @param  \App\Http\Requests\UpdateInventairesAvecComptesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventairesAvecComptesRequest $request, $id)
    {
        if (! Gate::allows('inventaires_avec_compte_edit')) {
            return abort(401);
        }
        $inventaires_avec_compte = InventairesAvecCompte::findOrFail($id);
        $inventaires_avec_compte->update($request->all());
        $inventaires_avec_compte->options()->sync(array_filter((array)$request->input('options')));



        return redirect()->route('admin.inventaires_avec_comptes.index');
    }


    /**
     * Display InventairesAvecCompte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('inventaires_avec_compte_view')) {
            return abort(401);
        }
        $inventaires_avec_compte = InventairesAvecCompte::findOrFail($id);

        return view('admin.inventaires_avec_comptes.show', compact('inventaires_avec_compte'));
    }


    /**
     * Remove InventairesAvecCompte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('inventaires_avec_compte_delete')) {
            return abort(401);
        }
        $inventaires_avec_compte = InventairesAvecCompte::findOrFail($id);
        $inventaires_avec_compte->delete();

        return redirect()->route('admin.inventaires_avec_comptes.index');
    }

    /**
     * Delete all selected InventairesAvecCompte at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('inventaires_avec_compte_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = InventairesAvecCompte::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore InventairesAvecCompte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('inventaires_avec_compte_delete')) {
            return abort(401);
        }
        $inventaires_avec_compte = InventairesAvecCompte::onlyTrashed()->findOrFail($id);
        $inventaires_avec_compte->restore();

        return redirect()->route('admin.inventaires_avec_comptes.index');
    }

    /**
     * Permanently delete InventairesAvecCompte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('inventaires_avec_compte_delete')) {
            return abort(401);
        }
        $inventaires_avec_compte = InventairesAvecCompte::onlyTrashed()->findOrFail($id);
        $inventaires_avec_compte->forceDelete();

        return redirect()->route('admin.inventaires_avec_comptes.index');
    }
}
