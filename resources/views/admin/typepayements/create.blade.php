@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.typepayement.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.typepayements.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('designation_typepayement', trans('quickadmin.typepayement.fields.designation-typepayement').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('designation_typepayement', old('designation_typepayement'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('designation_typepayement'))
                        <p class="help-block">
                            {{ $errors->first('designation_typepayement') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

