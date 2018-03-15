@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.commandes-avec-compte.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.compte')</th>
                            <td field-key='compte'>{{ $commandes_avec_compte->compte->nom_compte or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.compte.fields.prenom-compte')</th>
                            <td field-key='prenom_compte'>{{ isset($commandes_avec_compte->compte) ? $commandes_avec_compte->compte->prenom_compte : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.user')</th>
                            <td field-key='user'>{{ $commandes_avec_compte->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.prenom-user')</th>
                            <td field-key='prenom_user'>{{ isset($commandes_avec_compte->user) ? $commandes_avec_compte->user->prenom_user : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.adresse-de-livraison')</th>
                            <td field-key='adresse_de_livraison'>{{ $commandes_avec_compte->adresse_de_livraison }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.date-heur-souhaitee')</th>
                            <td field-key='date_heur_souhaitee'>{{ $commandes_avec_compte->date_heur_souhaitee }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.date-depot-cmd')</th>
                            <td field-key='date_depot_cmd'>{{ $commandes_avec_compte->date_depot_cmd }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.date-livre-cmd')</th>
                            <td field-key='date_livre_cmd'>{{ $commandes_avec_compte->date_livre_cmd }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.total-addition')</th>
                            <td field-key='total_addition'>{{ $commandes_avec_compte->total_addition }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.etat-cmd')</th>
                            <td field-key='etat_cmd'>{{ $commandes_avec_compte->etat_cmd->designation_etatcom or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.typepayement')</th>
                            <td field-key='typepayement'>{{ $commandes_avec_compte->typepayement->designation_typepayement or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.date-encaisse')</th>
                            <td field-key='date_encaisse'>{{ $commandes_avec_compte->date_encaisse }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.etat-livraison')</th>
                            <td field-key='etat_livraison'>{{ $commandes_avec_compte->etat_livraison->designation_etatlivraison or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.commandes-avec-compte.fields.map')</th>
                            <td field-key='map'>{{ $commandes_avec_compte->map_address }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#inventairesaveccompte" aria-controls="inventairesaveccompte" role="tab" data-toggle="tab">Inventaires avec compte</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="inventairesaveccompte">
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

            <a href="{{ route('admin.commandes_avec_comptes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
