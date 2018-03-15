@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inventaires-avec-compte.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.inventaires-avec-compte.fields.produit')</th>
                            <td field-key='produit'>{{ $inventaires_avec_compte->produit->designation_produit or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.produit.fields.prix-unit-produit')</th>
                            <td field-key='prix_unit_produit'>{{ isset($inventaires_avec_compte->produit) ? $inventaires_avec_compte->produit->prix_unit_produit : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inventaires-avec-compte.fields.options')</th>
                            <td field-key='options'>
                                @foreach ($inventaires_avec_compte->options as $singleOptions)
                                    <span class="label label-info label-many">{{ $singleOptions->designation_option }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inventaires-avec-compte.fields.quantite')</th>
                            <td field-key='quantite'>{{ $inventaires_avec_compte->quantite }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.inventaires_avec_comptes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
