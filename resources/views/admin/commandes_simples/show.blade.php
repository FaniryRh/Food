@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.commandes-simples.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.nom-client')</th>
                            <td field-key='nom_client'>{{ $commandes_simple->nom_client }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.adresse-client')</th>
                            <td field-key='adresse_client'>{{ $commandes_simple->adresse_client }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.phone-client')</th>
                            <td field-key='phone_client'>{{ $commandes_simple->phone_client }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.adresse-de-livraison')</th>
                            <td field-key='adresse_de_livraison'>{{ $commandes_simple->adresse_de_livraison }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.total-addition')</th>
                            <td field-key='total_addition'>{{ $commandes_simple->total_addition }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.date-encaisse')</th>
                            <td field-key='date_encaisse'>{{ $commandes_simple->date_encaisse }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.user')</th>
                            <td field-key='user'>{{ $commandes_simple->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.etat-cmd')</th>
                            <td field-key='etat_cmd'>{{ $commandes_simple->etat_cmd->designation_etatcom or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.etat-livraison')</th>
                            <td field-key='etat_livraison'>{{ $commandes_simple->etat_livraison->designation_etatlivraison or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.date-heur-souhaitee')</th>
                            <td field-key='date_heur_souhaitee'>{{ $commandes_simple->date_heur_souhaitee }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.date-heur-arrive-livr')</th>
                            <td field-key='date_heur_arrive_livr'>{{ $commandes_simple->date_heur_arrive_livr }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-simples.fields.map')</th>
                            <td field-key='map'>{{ $commandes_simple->map_address }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#inventairessimple" aria-controls="inventairessimple" role="tab" data-toggle="tab">Inventaires simple</a></li>
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.commandes_simples.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
