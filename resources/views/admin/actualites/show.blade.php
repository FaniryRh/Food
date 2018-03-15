@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.actualite.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.actualite.fields.titre')</th>
                            <td field-key='titre'>{{ $actualite->titre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.actualite.fields.photo')</th>
                            <td field-key='photo'>@if($actualite->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $actualite->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $actualite->photo) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.actualite.fields.description')</th>
                            <td field-key='description'>{!! $actualite->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.actualites.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
