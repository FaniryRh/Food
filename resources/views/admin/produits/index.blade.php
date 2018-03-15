@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.produit.title')</h3>
    @can('produit_create')
    <p>
        <a href="{{ route('admin.produits.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('produit_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.produits.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.produits.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($produits) > 0 ? 'datatable' : '' }} @can('produit_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('produit_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('produit_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
                                    @can('produit_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.produits.restore', $produit->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('produit_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.produits.perma_del', $produit->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('produit_view')
                                    <a href="{{ route('admin.produits.show',[$produit->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('produit_edit')
                                    <a href="{{ route('admin.produits.edit',[$produit->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('produit_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.produits.destroy', $produit->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('produit_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.produits.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection