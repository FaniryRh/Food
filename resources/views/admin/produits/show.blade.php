@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.produit.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.produit.fields.photo-produit')</th>
                            <td field-key='photo_produit'>@if($produit->photo_produit)<a href="{{ asset(env('UPLOAD_PATH').'/' . $produit->photo_produit) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $produit->photo_produit) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produit.fields.designation-produit')</th>
                            <td field-key='designation_produit'>{{ $produit->designation_produit }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produit.fields.categorie')</th>
                            <td field-key='categorie'>{{ $produit->categorie->designation or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produit.fields.option-id')</th>
                            <td field-key='option_id'>
                                @foreach ($produit->option_id as $singleOptionId)
                                    <span class="label label-info label-many">{{ $singleOptionId->designation_option }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produit.fields.prix-unit-produit')</th>
                            <td field-key='prix_unit_produit'>{{ $produit->prix_unit_produit }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#inventairessimple" aria-controls="inventairessimple" role="tab" data-toggle="tab">Inventaires simple</a></li>
<li role="presentation" class=""><a href="#inventairesaveccompte" aria-controls="inventairesaveccompte" role="tab" data-toggle="tab">Inventaires avec compte</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="inventairessimple">
<table class="table table-bordered table-striped {{ count($inventaires_simples) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.inventaires-simple.fields.produit')</th>
                        <th>@lang('quickadmin.inventaires-simple.fields.options')</th>
                        <th>@lang('quickadmin.inventaires-simple.fields.quantite')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($inventaires_simples) > 0)
            @foreach ($inventaires_simples as $inventaires_simple)
                <tr data-entry-id="{{ $inventaires_simple->id }}">
                    <td field-key='produit'>{{ $inventaires_simple->produit->designation_produit or '' }}</td>
                                <td field-key='options'>
                                    @foreach ($inventaires_simple->options as $singleOptions)
                                        <span class="label label-info label-many">{{ $singleOptions->designation_option }}</span>
                                    @endforeach
                                </td>
                                <td field-key='quantite'>{{ $inventaires_simple->quantite }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['inventaires_simples.restore', $inventaires_simple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['inventaires_simples.perma_del', $inventaires_simple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('inventaires_simples.show',[$inventaires_simple->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('inventaires_simples.edit',[$inventaires_simple->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['inventaires_simples.destroy', $inventaires_simple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="inventairesaveccompte">
<table class="table table-bordered table-striped {{ count($inventaires_avec_comptes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.inventaires-avec-compte.fields.produit')</th>
                        <th>@lang('quickadmin.inventaires-avec-compte.fields.options')</th>
                        <th>@lang('quickadmin.inventaires-avec-compte.fields.quantite')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($inventaires_avec_comptes) > 0)
            @foreach ($inventaires_avec_comptes as $inventaires_avec_compte)
                <tr data-entry-id="{{ $inventaires_avec_compte->id }}">
                    <td field-key='produit'>{{ $inventaires_avec_compte->produit->designation_produit or '' }}</td>
                                <td field-key='options'>
                                    @foreach ($inventaires_avec_compte->options as $singleOptions)
                                        <span class="label label-info label-many">{{ $singleOptions->designation_option }}</span>
                                    @endforeach
                                </td>
                                <td field-key='quantite'>{{ $inventaires_avec_compte->quantite }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['inventaires_avec_comptes.restore', $inventaires_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['inventaires_avec_comptes.perma_del', $inventaires_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('inventaires_avec_comptes.show',[$inventaires_avec_compte->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('inventaires_avec_comptes.edit',[$inventaires_avec_compte->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['inventaires_avec_comptes.destroy', $inventaires_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.produits.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
