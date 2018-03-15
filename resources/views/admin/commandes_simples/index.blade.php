@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.commandes-simples.title')</h3>
    @can('commandes_simple_create')
    <p>
        <a href="{{ route('admin.commandes_simples.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('commandes_simple_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.commandes_simples.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.commandes_simples.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($commandes_simples) > 0 ? 'datatable' : '' }} @can('commandes_simple_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('commandes_simple_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.commandes-simples.fields.nom-client')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.adresse-client')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.phone-client')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.adresse-de-livraison')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.total-addition')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.date-encaisse')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.user')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.etat-cmd')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.etat-livraison')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.date-heur-souhaitee')</th>
                        <th>@lang('quickadmin.commandes-simples.fields.date-heur-arrive-livr')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($commandes_simples) > 0)
                        @foreach ($commandes_simples as $commandes_simple)
                            <tr data-entry-id="{{ $commandes_simple->id }}">
                                @can('commandes_simple_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='nom_client'>{{ $commandes_simple->nom_client }}</td>
                                <td field-key='adresse_client'>{{ $commandes_simple->adresse_client }}</td>
                                <td field-key='phone_client'>{{ $commandes_simple->phone_client }}</td>
                                <td field-key='adresse_de_livraison'>{{ $commandes_simple->adresse_de_livraison }}</td>
                                <td field-key='total_addition'>{{ $commandes_simple->total_addition }}</td>
                                <td field-key='date_encaisse'>{{ $commandes_simple->date_encaisse }}</td>
                                <td field-key='user'>{{ $commandes_simple->user->name or '' }}</td>
                                <td field-key='etat_cmd'>{{ $commandes_simple->etat_cmd->designation_etatcom or '' }}</td>
                                <td field-key='etat_livraison'>{{ $commandes_simple->etat_livraison->designation_etatlivraison or '' }}</td>
                                <td field-key='date_heur_souhaitee'>{{ $commandes_simple->date_heur_souhaitee }}</td>
                                <td field-key='date_heur_arrive_livr'>{{ $commandes_simple->date_heur_arrive_livr }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('commandes_simple_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_simples.restore', $commandes_simple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('commandes_simple_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_simples.perma_del', $commandes_simple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('commandes_simple_view')
                                    <a href="{{ route('admin.commandes_simples.show',[$commandes_simple->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('commandes_simple_edit')
                                    <a href="{{ route('admin.commandes_simples.edit',[$commandes_simple->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('commandes_simple_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_simples.destroy', $commandes_simple->id])) !!}
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
        @can('commandes_simple_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.commandes_simples.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection