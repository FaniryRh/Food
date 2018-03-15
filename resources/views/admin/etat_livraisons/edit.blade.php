@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.etat-livraison.title')</h3>
    
    {!! Form::model($etat_livraison, ['method' => 'PUT', 'route' => ['admin.etat_livraisons.update', $etat_livraison->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

