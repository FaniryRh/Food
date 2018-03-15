<?php

namespace App\Http\Controllers\Admin;

use App\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreComptesRequest;
use App\Http\Requests\Admin\UpdateComptesRequest;
use Yajra\DataTables\DataTables;

class ComptesController extends Controller
{
    /**
     * Display a listing of Compte.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('compte_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Compte::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('compte_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'comptes.id',
                'comptes.nom_compte',
                'comptes.prenom_compte',
                'comptes.mdp_compte',
                'comptes.phone_compte',
                'comptes.mail_compte',
                'comptes.adresse_compte',
                'comptes.ville_compte',
                'comptes.quartier_compte',
                'comptes.solde_compte',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'compte_';
                $routeKey = 'admin.comptes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nom_compte', function ($row) {
                return $row->nom_compte ? $row->nom_compte : '';
            });
            $table->editColumn('prenom_compte', function ($row) {
                return $row->prenom_compte ? $row->prenom_compte : '';
            });
            $table->editColumn('mdp_compte', function ($row) {
                return '---';
            });
            $table->editColumn('phone_compte', function ($row) {
                return $row->phone_compte ? $row->phone_compte : '';
            });
            $table->editColumn('mail_compte', function ($row) {
                return $row->mail_compte ? $row->mail_compte : '';
            });
            $table->editColumn('adresse_compte', function ($row) {
                return $row->adresse_compte ? $row->adresse_compte : '';
            });
            $table->editColumn('ville_compte', function ($row) {
                return $row->ville_compte ? $row->ville_compte : '';
            });
            $table->editColumn('quartier_compte', function ($row) {
                return $row->quartier_compte ? $row->quartier_compte : '';
            });
            $table->editColumn('solde_compte', function ($row) {
                return $row->solde_compte ? $row->solde_compte : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.comptes.index');
    }

    /**
     * Show the form for creating new Compte.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('compte_create')) {
            return abort(401);
        }
        return view('admin.comptes.create');
    }

    /**
     * Store a newly created Compte in storage.
     *
     * @param  \App\Http\Requests\StoreComptesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComptesRequest $request)
    {
        if (! Gate::allows('compte_create')) {
            return abort(401);
        }
        $compte = Compte::create($request->all());



        return redirect()->route('admin.comptes.index');
    }


    /**
     * Show the form for editing Compte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('compte_edit')) {
            return abort(401);
        }
        $compte = Compte::findOrFail($id);

        return view('admin.comptes.edit', compact('compte'));
    }

    /**
     * Update Compte in storage.
     *
     * @param  \App\Http\Requests\UpdateComptesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComptesRequest $request, $id)
    {
        if (! Gate::allows('compte_edit')) {
            return abort(401);
        }
        $compte = Compte::findOrFail($id);
        $compte->update($request->all());



        return redirect()->route('admin.comptes.index');
    }


    /**
     * Display Compte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('compte_view')) {
            return abort(401);
        }
        $commandes_avec_comptes = \App\CommandesAvecCompte::where('compte_id', $id)->get();

        $compte = Compte::findOrFail($id);

        return view('admin.comptes.show', compact('compte', 'commandes_avec_comptes'));
    }


    /**
     * Remove Compte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('compte_delete')) {
            return abort(401);
        }
        $compte = Compte::findOrFail($id);
        $compte->delete();

        return redirect()->route('admin.comptes.index');
    }

    /**
     * Delete all selected Compte at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('compte_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Compte::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Compte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('compte_delete')) {
            return abort(401);
        }
        $compte = Compte::onlyTrashed()->findOrFail($id);
        $compte->restore();

        return redirect()->route('admin.comptes.index');
    }

    /**
     * Permanently delete Compte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('compte_delete')) {
            return abort(401);
        }
        $compte = Compte::onlyTrashed()->findOrFail($id);
        $compte->forceDelete();

        return redirect()->route('admin.comptes.index');
    }
}
