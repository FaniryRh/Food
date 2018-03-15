@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.etat-livraison.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.etat_livraisons.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('designation_etatlivraison', trans('quickadmin.etat-livraison.fields.designation-etatlivraison').'', ['class' => 'control-label']) !!}
                    {!! Form::text('designation_etatlivraison', old('designation_etatlivraison'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('designation_etatlivraison'))
                        <p class="help-block">
                            {{ $errors->first('designation_etatlivraison') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

