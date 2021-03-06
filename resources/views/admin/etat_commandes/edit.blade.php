@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.etat-commande.title')</h3>
    
    {!! Form::model($etat_commande, ['method' => 'PUT', 'route' => ['admin.etat_commandes.update', $etat_commande->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('designation_etatcom', trans('quickadmin.etat-commande.fields.designation-etatcom').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('designation_etatcom', old('designation_etatcom'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('designation_etatcom'))
                        <p class="help-block">
                            {{ $errors->first('designation_etatcom') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

