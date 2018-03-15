@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inventaires-simple.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.inventaires_simples.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cmd_simpl_id', trans('quickadmin.inventaires-simple.fields.cmd-simpl').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('cmd_simpl_id', $cmd_simpls, old('cmd_simpl_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cmd_simpl_id'))
                        <p class="help-block">
                            {{ $errors->first('cmd_simpl_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('produit_id', trans('quickadmin.inventaires-simple.fields.produit').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('produit_id', $produits, old('produit_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('produit_id'))
                        <p class="help-block">
                            {{ $errors->first('produit_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('options', trans('quickadmin.inventaires-simple.fields.options').'', ['class' => 'control-label']) !!}
                    {!! Form::select('options[]', $options, old('options'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('options'))
                        <p class="help-block">
                            {{ $errors->first('options') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantite', trans('quickadmin.inventaires-simple.fields.quantite').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('quantite', old('quantite'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantite'))
                        <p class="help-block">
                            {{ $errors->first('quantite') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

