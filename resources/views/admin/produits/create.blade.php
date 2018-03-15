@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.produit.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.produits.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo_produit', trans('quickadmin.produit.fields.photo-produit').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('photo_produit', ['class' => 'form-control', 'style' => 'margin-top: 4px;', 'required' => '']) !!}
                    {!! Form::hidden('photo_produit_max_size', 5) !!}
                    {!! Form::hidden('photo_produit_max_width', 4096) !!}
                    {!! Form::hidden('photo_produit_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('photo_produit'))
                        <p class="help-block">
                            {{ $errors->first('photo_produit') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('designation_produit', trans('quickadmin.produit.fields.designation-produit').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('designation_produit', old('designation_produit'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('designation_produit'))
                        <p class="help-block">
                            {{ $errors->first('designation_produit') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('categorie_id', trans('quickadmin.produit.fields.categorie').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('categorie_id', $categories, old('categorie_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('categorie_id'))
                        <p class="help-block">
                            {{ $errors->first('categorie_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option_id', trans('quickadmin.produit.fields.option-id').'', ['class' => 'control-label']) !!}
                    {!! Form::select('option_id[]', $option_ids, old('option_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option_id'))
                        <p class="help-block">
                            {{ $errors->first('option_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prix_unit_produit', trans('quickadmin.produit.fields.prix-unit-produit').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('prix_unit_produit', old('prix_unit_produit'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prix_unit_produit'))
                        <p class="help-block">
                            {{ $errors->first('prix_unit_produit') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

