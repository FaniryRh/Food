<?php

namespace App\Http\Controllers\Admin;

use App\InventairesSimple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInventairesSimplesRequest;
use App\Http\Requests\Admin\UpdateInventairesSimplesRequest;
use Yajra\DataTables\DataTables;

class InventairesSimplesController extends Controller
{
    /**
     * Display a listing of InventairesSimple.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('inventaires_simple_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = InventairesSimple::query();
            $query->with("cmd_simpl");
            $query->with("produit");
            $query->with("options");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('inventaires_simple_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'inventaires_simples.id',
                'inventaires_simples.cmd_simpl_id',
                'inventaires_simples.produit_id',
                'inventaires_simples.quantite',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'inventaires_simple_';
                $routeKey = 'admin.inventaires_simples';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('cmd_simpl.nom_client', function ($row) {
                return $row->cmd_simpl ? $row->cmd_simpl->nom_client : '';
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

        return view('admin.inventaires_simples.index');
    }

    /**
     * Show the form for creating new InventairesSimple.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('inventaires_simple_create')) {
            return abort(401);
        }
        
        $cmd_simpls = \App\CommandesSimple::get()->pluck('nom_client', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $produits = \App\Produit::get()->pluck('designation_produit', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $options = \App\Option::get()->pluck('designation_option', 'id');


        return view('admin.inventaires_simples.create', compact('cmd_simpls', 'produits', 'options'));
    }

    /**
     * Store a newly created InventairesSimple in storage.
     *
     * @param  \App\Http\Requests\StoreInventairesSimplesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventairesSimplesRequest $request)
    {
        if (! Gate::allows('inventaires_simple_create')) {
            return abort(401);
        }
        $inventaires_simple = InventairesSimple::create($request->all());
        $inventaires_simple->options()->sync(array_filter((array)$request->input('options')));



        return redirect()->route('admin.inventaires_simples.index');
    }


    /**
     * Show the form for editing InventairesSimple.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('inventaires_simple_edit')) {
            return abort(401);
        }
        
        $cmd_simpls = \App\CommandesSimple::get()->pluck('nom_client', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $produits = \App\Produit::get()->pluck('designation_produit', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $options = \App\Option::get()->pluck('designation_option', 'id');


        $inventaires_simple = InventairesSimple::findOrFail($id);

        return view('admin.inventaires_simples.edit', compact('inventaires_simple', 'cmd_simpls', 'produits', 'options'));
    }

    /**
     * Update InventairesSimple in storage.
     *
     * @param  \App\Http\Requests\UpdateInventairesSimplesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventairesSimplesRequest $request, $id)
    {
        if (! Gate::allows('inventaires_simple_edit')) {
            return abort(401);
        }
        $inventaires_simple = InventairesSimple::findOrFail($id);
        $inventaires_simple->update($request->all());
        $inventaires_simple->options()->sync(array_filter((array)$request->input('options')));



        return redirect()->route('admin.inventaires_simples.index');
    }


    /**
     * Display InventairesSimple.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('inventaires_simple_view')) {
            return abort(401);
        }
        $inventaires_simple = InventairesSimple::findOrFail($id);

        return view('admin.inventaires_simples.show', compact('inventaires_simple'));
    }


    /**
     * Remove InventairesSimple from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('inventaires_simple_delete')) {
            return abort(401);
        }
        $inventaires_simple = InventairesSimple::findOrFail($id);
        $inventaires_simple->delete();

        return redirect()->route('admin.inventaires_simples.index');
    }

    /**
     * Delete all selected InventairesSimple at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('inventaires_simple_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = InventairesSimple::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore InventairesSimple from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('inventaires_simple_delete')) {
            return abort(401);
        }
        $inventaires_simple = InventairesSimple::onlyTrashed()->findOrFail($id);
        $inventaires_simple->restore();

        return redirect()->route('admin.inventaires_simples.index');
    }

    /**
     * Permanently delete InventairesSimple from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('inventaires_simple_delete')) {
            return abort(401);
        }
        $inventaires_simple = InventairesSimple::onlyTrashed()->findOrFail($id);
        $inventaires_simple->forceDelete();

        return redirect()->route('admin.inventaires_simples.index');
    }
}
