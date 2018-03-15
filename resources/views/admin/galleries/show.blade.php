@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.gallerie.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.gallerie.fields.photo')</th>
                            <td field-key='photo'>@if($gallery->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $gallery->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $gallery->photo) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.gallerie.fields.titre')</th>
                            <td field-key='titre'>{{ $gallery->titre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.gallerie.fields.description')</th>
                            <td field-key='description'>{{ $gallery->description }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.galleries.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
