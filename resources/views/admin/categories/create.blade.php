@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.categorie.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.categories.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('designation', trans('quickadmin.categorie.fields.designation').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('designation', old('designation'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('designation'))
                        <p class="help-block">
                            {{ $errors->first('designation') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
