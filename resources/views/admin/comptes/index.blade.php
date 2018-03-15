@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.compte.title')</h3>
    @can('compte_create')
    <p>
        <a href="{{ route('admin.comptes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('compte_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.comptes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.comptes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('compte_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('compte_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.compte.fields.nom-compte')</th>
                        <th>@lang('quickadmin.compte.fields.prenom-compte')</th>
                        <th>@lang('quickadmin.compte.fields.mdp-compte')</th>
                        <th>@lang('quickadmin.compte.fields.phone-compte')</th>
                        <th>@lang('quickadmin.compte.fields.mail-compte')</th>
                        <th>@lang('quickadmin.compte.fields.adresse-compte')</th>
                        <th>@lang('quickadmin.compte.fields.ville-compte')</th>
                        <th>@lang('quickadmin.compte.fields.quartier-compte')</th>
                        <th>@lang('quickadmin.compte.fields.solde-compte')</th>
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
        @can('compte_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.comptes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.comptes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('compte_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'nom_compte', name: 'nom_compte'},
                {data: 'prenom_compte', name: 'prenom_compte'},
                {data: 'mdp_compte', name: 'mdp_compte'},
                {data: 'phone_compte', name: 'phone_compte'},
                {data: 'mail_compte', name: 'mail_compte'},
                {data: 'adresse_compte', name: 'adresse_compte'},
                {data: 'ville_compte', name: 'ville_compte'},
                {data: 'quartier_compte', name: 'quartier_compte'},
                {data: 'solde_compte', name: 'solde_compte'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection