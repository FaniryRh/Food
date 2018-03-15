@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.etat-livraison.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.etat-livraison.fields.designation-etatlivraison')</th>
                            <td field-key='designation_etatlivraison'>{{ $etat_livraison->designation_etatlivraison }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#commandessimples" aria-controls="commandessimples" role="tab" data-toggle="tab">Commandes simples</a></li>
<li role="presentation" class=""><a href="#commandesaveccompte" aria-controls="commandesaveccompte" role="tab" data-toggle="tab">Commandes avec compte</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="commandessimples">
<table class="table table-bordered table-striped {{ count($commandes_simples) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['commandes_simples.restore', $commandes_simple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['commandes_simples.perma_del', $commandes_simple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('commandes_simples.show',[$commandes_simple->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('commandes_simples.edit',[$commandes_simple->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['commandes_simples.destroy', $commandes_simple->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="commandesaveccompte">
<table class="table table-bordered table-striped {{ count($commandes_avec_comptes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.commandes-avec-compte.fields.compte')</th>
                        <th>@lang('quickadmin.commandes-avec-compte.fields.user')</th>
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
                    <td field-key='compte'>{{ $commandes_avec_compte->compte->nom_compte or '' }}</td>
                                <td field-key='user'>{{ $commandes_avec_compte->user->name or '' }}</td>
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
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['commandes_avec_comptes.restore', $commandes_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['commandes_avec_comptes.perma_del', $commandes_avec_compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('commandes_avec_comptes.show',[$commandes_avec_compte->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('commandes_avec_comptes.edit',[$commandes_avec_compte->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['commandes_avec_comptes.destroy', $commandes_avec_compte->id])) !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.etat_livraisons.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
