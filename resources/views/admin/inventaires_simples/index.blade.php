@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inventaires-simple.title')</h3>
    @can('inventaires_simple_create')
    <p>
        <a href="{{ route('admin.inventaires_simples.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('inventaires_simple_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.inventaires_simples.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.inventaires_simples.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('inventaires_simple_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('inventaires_simple_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.inventaires-simple.fields.cmd-simpl')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.date-heur-souhaitee')</th>
                        <th>@lang('quickadmin.inventaires-simple.fields.produit')</th>
                        <th>@lang('quickadmin.produit.fields.prix-unit-produit')</th>
                        <th>@lang('quickadmin.inventaires-simple.fields.options')</th>
                        <th>@lang('quickadmin.inventaires-simple.fields.quantite')</th>
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
        @can('inventaires_simple_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.inventaires_simples.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.inventaires_simples.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('inventaires_simple_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'cmd_simpl.nom_client', name: 'cmd_simpl.nom_client'},
                {data: 'cmd_simpl.date_heur_souhaitee', name: 'cmd_simpl.date_heur_souhaitee'},
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