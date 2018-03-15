@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inventaires-avec-compte.title')</h3>
    
    {!! Form::model($inventaires_avec_compte, ['method' => 'PUT', 'route' => ['admin.inventaires_avec_comptes.update', $inventaires_avec_compte->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cmd_compt_id', trans('quickadmin.inventaires-avec-compte.fields.cmd-compt').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('cmd_compt_id', $cmd_compts, old('cmd_compt_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cmd_compt_id'))
                        <p class="help-block">
                            {{ $errors->first('cmd_compt_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('produit_id', trans('quickadmin.inventaires-avec-compte.fields.produit').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('options', trans('quickadmin.inventaires-avec-compte.fields.options').'', ['class' => 'control-label']) !!}
                    {!! Form::select('options[]', $options, old('options') ? old('options') : $inventaires_avec_compte->options->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
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
                    {!! Form::label('quantite', trans('quickadmin.inventaires-avec-compte.fields.quantite').'*', ['class' => 'control-label']) !!}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

