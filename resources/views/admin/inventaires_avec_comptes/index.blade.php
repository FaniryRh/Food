@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inventaires-avec-compte.title')</h3>
    @can('inventaires_avec_compte_create')
    <p>
        <a href="{{ route('admin.inventaires_avec_comptes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('inventaires_avec_compte_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.inventaires_avec_comptes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.inventaires_avec_comptes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('inventaires_avec_compte_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('inventaires_avec_compte_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.inventaires-avec-compte.fields.cmd-compt')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.date-livre-cmd')</th>
                        <th>@lang('quickadmin.inventaires-avec-compte.fields.produit')</th>
                        <th>@lang('quickadmin.produit.fields.prix-unit-produit')</th>
                        <th>@lang('quickadmin.inventaires-avec-compte.fields.options')</th>
                        <th>@lang('quickadmin.inventaires-avec-compte.fields.quantite')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('inventaires_avec_compte_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.inventaires_avec_comptes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.inventaires_avec_comptes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('inventaires_avec_compte_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'cmd_compt.date_depot_cmd', name: 'cmd_compt.date_depot_cmd'},
                {data: 'cmd_compt.date_livre_cmd', name: 'cmd_compt.date_livre_cmd'},
                {data: 'produit.designation_produit', name: 'produit.designation_produit'},
                {data: 'produit.prix_unit_produit', name: 'produit.prix_unit_produit'},
                {data: 'options.designation_option', name: 'options.designation_option'},
                {data: 'quantite', name: 'quantite'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection