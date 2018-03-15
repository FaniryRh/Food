@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.commandes-avec-compte.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.commandes_avec_comptes.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('compte_id', trans('quickadmin.commandes-avec-compte.fields.compte').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('compte_id', $comptes, old('compte_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('compte_id'))
                        <p class="help-block">
                            {{ $errors->first('compte_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', trans('quickadmin.commandes-avec-compte.fields.user').'', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('adresse_de_livraison', trans('quickadmin.commandes-avec-compte.fields.adresse-de-livraison').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('adresse_de_livraison', old('adresse_de_livraison'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('adresse_de_livraison'))
                        <p class="help-block">
                            {{ $errors->first('adresse_de_livraison') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_heur_souhaitee', trans('quickadmin.commandes-avec-compte.fields.date-heur-souhaitee').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('date_heur_souhaitee', old('date_heur_souhaitee'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_heur_souhaitee'))
                        <p class="help-block">
                            {{ $errors->first('date_heur_souhaitee') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_depot_cmd', trans('quickadmin.commandes-avec-compte.fields.date-depot-cmd').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_depot_cmd', old('date_depot_cmd'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_depot_cmd'))
                        <p class="help-block">
                            {{ $errors->first('date_depot_cmd') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_livre_cmd', trans('quickadmin.commandes-avec-compte.fields.date-livre-cmd').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_livre_cmd', old('date_livre_cmd'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_livre_cmd'))
                        <p class="help-block">
                            {{ $errors->first('date_livre_cmd') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_addition', trans('quickadmin.commandes-avec-compte.fields.total-addition').'', ['class' => 'control-label']) !!}
                    {!! Form::number('total_addition', old('total_addition'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_addition'))
                        <p class="help-block">
                            {{ $errors->first('total_addition') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('etat_cmd_id', trans('quickadmin.commandes-avec-compte.fields.etat-cmd').'', ['class' => 'control-label']) !!}
                    {!! Form::select('etat_cmd_id', $etat_cmds, old('etat_cmd_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('etat_cmd_id'))
                        <p class="help-block">
                            {{ $errors->first('etat_cmd_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('typepayement_id', trans('quickadmin.commandes-avec-compte.fields.typepayement').'', ['class' => 'control-label']) !!}
                    {!! Form::select('typepayement_id', $typepayements, old('typepayement_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('typepayement_id'))
                        <p class="help-block">
                            {{ $errors->first('typepayement_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_encaisse', trans('quickadmin.commandes-avec-compte.fields.date-encaisse').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_encaisse', old('date_encaisse'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_encaisse'))
                        <p class="help-block">
                            {{ $errors->first('date_encaisse') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('etat_livraison_id', trans('quickadmin.commandes-avec-compte.fields.etat-livraison').'', ['class' => 'control-label']) !!}
                    {!! Form::select('etat_livraison_id', $etat_livraisons, old('etat_livraison_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('etat_livraison_id'))
                        <p class="help-block">
                            {{ $errors->first('etat_livraison_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('map_address', trans('quickadmin.commandes-avec-compte.fields.map').'', ['class' => 'control-label']) !!}
                    {!! Form::text('map_address', old('map_address'), ['class' => 'form-control map-input', 'id' => 'map-input']) !!}
                    {!! Form::hidden('map_latitude', 0 , ['id' => 'map-latitude']) !!}
                    {!! Form::hidden('map_longitude', 0 , ['id' => 'map-longitude']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('map'))
                        <p class="help-block">
                            {{ $errors->first('map') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div id="map-map-container" style="width:100%;height:200px; ">
                <div style="width: 100%; height: 100%" id="map-map"></div>
            </div>
            @if(!env('GOOGLE_MAPS_API_KEY'))
                <b>'GOOGLE_MAPS_API_KEY' is not set in the .env</b>
            @endif
            
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Inventaires avec compte
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.inventaires-avec-compte.fields.quantite')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="inventaires-avec-compte">
                    @foreach(old('inventaires_avec_comptes', []) as $index => $data)
                        @include('admin.commandes_avec_comptes.inventaires_avec_comptes_row', [
                            'index' => $index
                        ])
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
   <script src="/adminlte/js/mapInput.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

    <script type="text/html" id="inventaires-avec-compte-template">
        @include('admin.commandes_avec_comptes.inventaires_avec_comptes_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop