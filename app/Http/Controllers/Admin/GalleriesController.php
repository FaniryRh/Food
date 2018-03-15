<?php

namespace App\Http\Controllers\Admin;

use App\Gallerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleriesRequest;
use App\Http\Requests\Admin\UpdateGalleriesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class GalleriesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Gallerie.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gallerie_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Gallerie::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('gallerie_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'galleries.id',
                'galleries.photo',
                'galleries.titre',
                'galleries.description',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'gallerie_';
                $routeKey = 'admin.galleries';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('photo', function ($row) {
                if($row->photo) { return '<a href="'. asset(env('UPLOAD_PATH').'/' . $row->photo) .'" target="_blank"><img src="'. asset(env('UPLOAD_PATH').'/thumb/' . $row->photo) .'"/>'; };
            });
            $table->editColumn('titre', function ($row) {
                return $row->titre ? $row->titre : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions','massDelete','photo']);

            return $table->make(true);
        }

        return view('admin.galleries.index');
    }

    /**
     * Show the form for creating new Gallerie.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gallerie_create')) {
            return abort(401);
        }
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created Gallerie in storage.
     *
     * @param  \App\Http\Requests\StoreGalleriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleriesRequest $request)
    {
        if (! Gate::allows('gallerie_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $gallerie = Gallerie::create($request->all());



        return redirect()->route('admin.galleries.index');
    }


    /**
     * Show the form for editing Gallerie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gallerie_edit')) {
            return abort(401);
        }
        $gallerie = Gallerie::findOrFail($id);

        return view('admin.galleries.edit', compact('gallerie'));
    }

    /**
     * Update Gallerie in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleriesRequest $request, $id)
    {
        if (! Gate::allows('gallerie_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $gallerie = Gallerie::findOrFail($id);
        $gallerie->update($request->all());



        return redirect()->route('admin.galleries.index');
    }


    /**
     * Display Gallerie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gallerie_view')) {
            return abort(401);
        }
        $gallerie = Gallerie::findOrFail($id);

        return view('admin.galleries.show', compact('gallerie'));
    }


    /**
     * Remove Gallerie from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gallerie_delete')) {
            return abort(401);
        }
        $gallerie = Gallerie::findOrFail($id);
        $gallerie->delete();

        return redirect()->route('admin.galleries.index');
    }

    /**
     * Delete all selected Gallerie at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gallerie_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gallerie::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Gallerie from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gallerie_delete')) {
            return abort(401);
        }
        $gallerie = Gallerie::onlyTrashed()->findOrFail($id);
        $gallerie->restore();

        return redirect()->route('admin.galleries.index');
    }

    /**
     * Permanently delete Gallerie from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gallerie_delete')) {
            return abort(401);
        }
        $gallerie = Gallerie::onlyTrashed()->findOrFail($id);
        $gallerie->forceDelete();

        return redirect()->route('admin.galleries.index');
    }
}
