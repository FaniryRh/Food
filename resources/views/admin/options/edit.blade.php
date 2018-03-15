@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.options.title')</h3>
    
    {!! Form::model($option, ['method' => 'PUT', 'route' => ['admin.options.update', $option->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('designation_option', trans('quickadmin.options.fields.designation-option').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('designation_option', old('designation_option'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('designation_option'))
                        <p class="help-block">
                            {{ $errors->first('designation_option') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

