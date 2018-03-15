<?php

namespace App\Http\Controllers\Admin;

use App\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreActualitesRequest;
use App\Http\Requests\Admin\UpdateActualitesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class ActualitesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Actualite.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('actualite_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Actualite::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('actualite_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'actualites.id',
                'actualites.titre',
                'actualites.photo',
                'actualites.description',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'actualite_';
                $routeKey = 'admin.actualites';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('titre', function ($row) {
                return $row->titre ? $row->titre : '';
            });
            $table->editColumn('photo', function ($row) {
                if($row->photo) { return '<a href="'. asset(env('UPLOAD_PATH').'/' . $row->photo) .'" target="_blank"><img src="'. asset(env('UPLOAD_PATH').'/thumb/' . $row->photo) .'"/>'; };
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions','massDelete','photo']);

            return $table->make(true);
        }

        return view('admin.actualites.index');
    }

    /**
     * Show the form for creating new Actualite.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('actualite_create')) {
            return abort(401);
        }
        return view('admin.actualites.create');
    }

    /**
     * Store a newly created Actualite in storage.
     *
     * @param  \App\Http\Requests\StoreActualitesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActualitesRequest $request)
    {
        if (! Gate::allows('actualite_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $actualite = Actualite::create($request->all());



        return redirect()->route('admin.actualites.index');
    }


    /**
     * Show the form for editing Actualite.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('actualite_edit')) {
            return abort(401);
        }
        $actualite = Actualite::findOrFail($id);

        return view('admin.actualites.edit', compact('actualite'));
    }

    /**
     * Update Actualite in storage.
     *
     * @param  \App\Http\Requests\UpdateActualitesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActualitesRequest $request, $id)
    {
        if (! Gate::allows('actualite_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $actualite = Actualite::findOrFail($id);
        $actualite->update($request->all());



        return redirect()->route('admin.actualites.index');
    }


    /**
     * Display Actualite.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('actualite_view')) {
            return abort(401);
        }
        $actualite = Actualite::findOrFail($id);

        return view('admin.actualites.show', compact('actualite'));
    }


    /**
     * Remove Actualite from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('actualite_delete')) {
            return abort(401);
        }
        $actualite = Actualite::findOrFail($id);
        $actualite->delete();

        return redirect()->route('admin.actualites.index');
    }

    /**
     * Delete all selected Actualite at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('actualite_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Actualite::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Actualite from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('actualite_delete')) {
            return abort(401);
        }
        $actualite = Actualite::onlyTrashed()->findOrFail($id);
        $actualite->restore();

        return redirect()->route('admin.actualites.index');
    }

    /**
     * Permanently delete Actualite from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('actualite_delete')) {
            return abort(401);
        }
        $actualite = Actualite::onlyTrashed()->findOrFail($id);
        $actualite->forceDelete();

        return redirect()->route('admin.actualites.index');
    }
}
