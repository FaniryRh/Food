@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.compte.title')</h3>
    
    {!! Form::model($compte, ['method' => 'PUT', 'route' => ['admin.comptes.update', $compte->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nom_compte', trans('quickadmin.compte.fields.nom-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nom_compte', old('nom_compte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nom_compte'))
                        <p class="help-block">
                            {{ $errors->first('nom_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prenom_compte', trans('quickadmin.compte.fields.prenom-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('prenom_compte', old('prenom_compte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prenom_compte'))
                        <p class="help-block">
                            {{ $errors->first('prenom_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mdp_compte', trans('quickadmin.compte.fields.mdp-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::password('mdp_compte', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mdp_compte'))
                        <p class="help-block">
                            {{ $errors->first('mdp_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone_compte', trans('quickadmin.compte.fields.phone-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('phone_compte', old('phone_compte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone_compte'))
                        <p class="help-block">
                            {{ $errors->first('phone_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mail_compte', trans('quickadmin.compte.fields.mail-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('mail_compte', old('mail_compte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mail_compte'))
                        <p class="help-block">
                            {{ $errors->first('mail_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('adresse_compte', trans('quickadmin.compte.fields.adresse-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('adresse_compte', old('adresse_compte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('adresse_compte'))
                        <p class="help-block">
                            {{ $errors->first('adresse_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ville_compte', trans('quickadmin.compte.fields.ville-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('ville_compte', old('ville_compte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ville_compte'))
                        <p class="help-block">
                            {{ $errors->first('ville_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quartier_compte', trans('quickadmin.compte.fields.quartier-compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('quartier_compte', old('quartier_compte'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quartier_compte'))
                        <p class="help-block">
                            {{ $errors->first('quartier_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('solde_compte', trans('quickadmin.compte.fields.solde-compte').'', ['class' => 'control-label']) !!}
                    {!! Form::number('solde_compte', old('solde_compte'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('solde_compte'))
                        <p class="help-block">
                            {{ $errors->first('solde_compte') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

