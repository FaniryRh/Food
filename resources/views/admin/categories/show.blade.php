@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.categorie.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.categorie.fields.designation')</th>
                            <td field-key='designation'>{{ $category->designation }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#produit" aria-controls="produit" role="tab" data-toggle="tab">Produit</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="produit">
<table class="table table-bordered table-striped {{ count($produits) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.produit.fields.photo-produit')</th>
                        <th>@lang('quickadmin.produit.fields.designation-produit')</th>
                        <th>@lang('quickadmin.produit.fields.categorie')</th>
                        <th>@lang('quickadmin.produit.fields.option-id')</th>
                        <th>@lang('quickadmin.produit.fields.prix-unit-produit')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($produits) > 0)
            @foreach ($produits as $produit)
                <tr data-entry-id="{{ $produit->id }}">
                    <td field-key='photo_produit'>@if($produit->photo_produit)<a href="{{ asset(env('UPLOAD_PATH').'/' . $produit->photo_produit) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $produit->photo_produit) }}"/></a>@endif</td>
                                <td field-key='designation_produit'>{{ $produit->designation_produit }}</td>
                                <td field-key='categorie'>{{ $produit->categorie->designation or '' }}</td>
                                <td field-key='option_id'>
                                    @foreach ($produit->option_id as $singleOptionId)
                                        <span class="label label-info label-many">{{ $singleOptionId->designation_option }}</span>
                                    @endforeach
                                </td>
                                <td field-key='prix_unit_produit'>{{ $produit->prix_unit_produit }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['produits.restore', $produit->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['produits.perma_del', $produit->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('produits.show',[$produit->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('produits.edit',[$produit->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['produits.destroy', $produit->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
