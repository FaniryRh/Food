@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.commandes-avec-compte.title')</h3>
    @can('commandes_avec_compte_create')
    <p>
        <a href="{{ route('admin.commandes_avec_comptes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('commandes_avec_compte_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.commandes_avec_comptes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.commandes_avec_comptes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($commandes_avec_comptes) > 0 ? 'datatable' : '' }} @can('commandes_avec_compte_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('commandes_avec_compte_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.commandes-avec-compte.fields.compte')</th>
                        <th>@lang('quickadmin.compte.fields.prenom-compte')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.user')</th>
                        <th>@lang('quickadmin.users.fields.prenom-user')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.adresse-de-livraison')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.date-heur-souhaitee')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.date-depot-cmd')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.date-livre-cmd')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.total-addition')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.etat-cmd')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.typepayement')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.date-encaisse')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.etat-livraison')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($commandes_avec_comptes) > 0)
                        @foreach ($commandes_avec_comptes as $commandes_avec_compte)
                            <tr data-entry-id="{{ $commandes_avec_compte->id }}">
                                @can('commandes_avec_compte_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='compte'>{{ $commandes_avec_compte->compte->nom_compte or '' }}</td>
<td field-key='prenom_compte'>{{ isset($commandes_avec_compte->compte) ? $commandes_avec_compte->compte->prenom_compte : '' }}</td>
                                <td field-key='user'>{{ $commandes_avec_compte->user->name or '' }}</td>
<td field-key='prenom_user'>{{ isset($commandes_avec_compte->user) ? $commandes_avec_compte->user->prenom_user : '' }}</td>
                                <td field-key='adresse_de_livraison'>{{ $commandes_avec_compte->adresse_de_livraison }}</td>
                                <td field-key='date_heur_souhaitee'>{{ $commandes_avec_compte->date_heur_souhaitee }}</td>
                                <td field-key='date_depot_cmd'>{{ $commandes_avec_compte->date_depot_cmd }}</td>
                                <td field-key='date_livre_cmd'>{{ $commandes_avec_compte->date_livre_cmd }}</td>
                                <td field-key='total_addition'>{{ $commandes_avec_compte->total_addition }}</td>
                                <td field-key='etat_cmd'>{{ $commandes_avec_compte->etat_cmd->designation_etatcom or '' }}</td>
                                <td field-key='typepayement'>{{ $commandes_avec_compte->typepayement->designation_typepayement or '' }}</td>
                                <td field-key='date_encaisse'>{{ $commandes_avec_compte->date_encaisse }}</td>
                                <td field-key='etat_livraison'>{{ $commandes_avec_compte->etat_livraison->designation_etatlivraison or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('commandes_avec_compte_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_avec_comptes.restore', $commandes_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('commandes_avec_compte_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_avec_comptes.perma_del', $commandes_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('commandes_avec_compte_view')
                                    <a href="{{ route('admin.commandes_avec_comptes.show',[$commandes_avec_compte->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('commandes_avec_compte_edit')
                                    <a href="{{ route('admin.commandes_avec_comptes.edit',[$commandes_avec_compte->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('commandes_avec_compte_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_avec_comptes.destroy', $commandes_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="17">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('commandes_avec_compte_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.commandes_avec_comptes.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection