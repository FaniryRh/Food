@extends('layouts.app')

@section('content')
    <div class="row">
         <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('quickadmin.commandes-simples.fields.nom-client')</th> 
                            <th> @lang('quickadmin.commandes-simples.fields.adresse-client')</th> 
                            <th> @lang('quickadmin.commandes-simples.fields.phone-client')</th> 
                            <th> @lang('quickadmin.commandes-simples.fields.adresse-de-livraison')</th> 
                            <th> @lang('quickadmin.commandes-simples.fields.total-addition')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($commandessimples as $commandessimple)
                            <tr>
                               
                                <td>{{ $commandessimple->nom_client }} </td> 
                                <td>{{ $commandessimple->adresse_client }} </td> 
                                <td>{{ $commandessimple->phone_client }} </td> 
                                <td>{{ $commandessimple->adresse_de_livraison }} </td> 
                                <td>{{ $commandessimple->total_addition }} </td> 
                                <td>

                                    @can('commandes_simple_view')
                                    <a href="{{ route('admin.commandes_simples.show',[$commandessimple->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan

                                    @can('commandes_simple_edit')
                                    <a href="{{ route('admin.commandes_simples.edit',[$commandessimple->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan

                                    @can('commandes_simple_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_simples.destroy', $commandessimple->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added commandesaveccomptes</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('quickadmin.commandes-avec-compte.fields.adresse-de-livraison')</th> 
                            <th> @lang('quickadmin.commandes-avec-compte.fields.date-heur-souhaitee')</th> 
                            <th> @lang('quickadmin.commandes-avec-compte.fields.date-depot-cmd')</th> 
                            <th> @lang('quickadmin.commandes-avec-compte.fields.date-livre-cmd')</th> 
                            <th> @lang('quickadmin.commandes-avec-compte.fields.total-addition')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($commandesaveccomptes as $commandesaveccompte)
                            <tr>
                               
                                <td>{{ $commandesaveccompte->adresse_de_livraison }} </td> 
                                <td>{{ $commandesaveccompte->date_heur_souhaitee }} </td> 
                                <td>{{ $commandesaveccompte->date_depot_cmd }} </td> 
                                <td>{{ $commandesaveccompte->date_livre_cmd }} </td> 
                                <td>{{ $commandesaveccompte->total_addition }} </td> 
                                <td>

                                    @can('commandes_avec_compte_view')
                                    <a href="{{ route('admin.commandes_avec_comptes.show',[$commandesaveccompte->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan

                                    @can('commandes_avec_compte_edit')
                                    <a href="{{ route('admin.commandes_avec_comptes.edit',[$commandesaveccompte->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan

                                    @can('commandes_avec_compte_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.commandes_avec_comptes.destroy', $commandesaveccompte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added comptes</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('quickadmin.compte.fields.nom-compte')</th> 
                            <th> @lang('quickadmin.compte.fields.prenom-compte')</th> 
                            <th> @lang('quickadmin.compte.fields.mdp-compte')</th> 
                            <th> @lang('quickadmin.compte.fields.phone-compte')</th> 
                            <th> @lang('quickadmin.compte.fields.mail-compte')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($comptes as $compte)
                            <tr>
                               
                                <td>{{ $compte->nom_compte }} </td> 
                                <td>{{ $compte->prenom_compte }} </td> 
                                <td>{{ $compte->mdp_compte }} </td> 
                                <td>{{ $compte->phone_compte }} </td> 
                                <td>{{ $compte->mail_compte }} </td> 
                                <td>

                                    @can('compte_view')
                                    <a href="{{ route('admin.comptes.show',[$compte->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan

                                    @can('compte_edit')
                                    <a href="{{ route('admin.comptes.edit',[$compte->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan

                                    @can('compte_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.comptes.destroy', $compte->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added users</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            
                            <th> @lang('quickadmin.users.fields.name')</th> 
                            <th> @lang('quickadmin.users.fields.prenom-user')</th> 
                            <th> @lang('quickadmin.users.fields.email')</th> 
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tr>
                               
                                <td>{{ $user->name }} </td> 
                                <td>{{ $user->prenom_user }} </td> 
                                <td>{{ $user->email }} </td> 
                                <td>

                                    @can('user_view')
                                    <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan

                                    @can('user_edit')
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan

                                    @can('user_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                
</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>


    </div>
@endsection

