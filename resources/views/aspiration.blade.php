@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Aspiración Folicular</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('aspiration_po') }}">Aspiración Folicular</a>
                </li>
                <li class="active">
                    <strong>Planilla de Aspiración Folicular</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Orden de Producción</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form method="post" action="{{ route('aspiration_store', $orderDetail->id) }}">
                                {{ csrf_field() }}
                                <div class="form-group col-lg-3">
                                    <label>Orden de producción</label>
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->id }}" disabled="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cliente</label>
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->client->bussiness_name }}" disabled="">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Fecha</label>
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->created_at }}" disabled="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Finca</label>
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->name }}" disabled="">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Receptoras Sincronizadas</label>
                                    <input type="text" class="form-control input-sm" name="txtSynchronizedReceivers" value="{{ $orderDetail->aspiration->synchronized_receivers }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Lote Medio MIV</label>
                                    <input type="text" class="form-control input-sm" name="txtMediumLotMIV" value="{{ $orderDetail->aspiration->medium_lot_miv }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Medio OPU</label>
                                    <input type="text" class="form-control input-sm" name="txtMediumOpu" value="{{ $orderDetail->aspiration->medium_opu }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Lote Medio OPU</label>
                                    <input type="text" class="form-control input-sm" name="txtMediumLotOpu" value="{{ $orderDetail->aspiration->medium_lot_opu }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Aspirador</label>
                                    <input type="text" class="form-control input-sm" name="txtAspirator" value="{{ $orderDetail->aspiration->aspirator }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Buscador</label>
                                    <input type="text" class="form-control input-sm" name="txtSearcher" value="{{ $orderDetail->aspiration->searcher }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Hora Llegada</label>
                                    <input type="text" class="form-control input-sm" name="txtArrivedTime" value="{{ $orderDetail->aspiration->arrived_time }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Temperatura Llegada</label>
                                    <input type="text" class="form-control input-sm" name="txtArrivedTemperature" value="{{ $orderDetail->aspiration->arrived_temperature }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nombre quien recibe</label>
                                    <input type="text" class="form-control input-sm" name="txtReceiverName" value="{{ $orderDetail->aspiration->receiver_name }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Tipo de Transporte</label>
                                    <input type="text" class="form-control input-sm" name="txtTransportType" value="{{ $orderDetail->aspiration->transport_type }}" {{ ( $orderDetail->aspiration->state == 0) ? '' : 'disabled' }}>
                                </div>
                                @if ($orderDetail->aspiration->state == 0)
                                    <div class="form-group col-lg-12" align="right">
                                        <button type="submit" class="btn btn-w-m btn-primary" >Guardar</button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Planilla de Aspiración Folicular (OPU)</h5>
                    </div>
                    <div class="ibox-content">
                        @if( $orderDetail->aspiration->state == 0)
                            <button type="button" class="btn btn-primary"id="btnAgregarM" name="btnAgregarM" >Agregar</button>
                        @endif
                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Planilla de Apiración Folicular</h4>
                                    </div>
                                    <form id="formPlanilla" method="POST" action="{{ route('aspiration_save', $orderDetail->id) }}">
                                        {{ csrf_field() }}
                                        <input id="txtAspirationId" name="txtAspirationId" type="hidden" value="" class="form-control">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Donadora</label>
                                                <input name="txtDonadora" id="txtDonadora" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza</label>
                                                <input name="txtRazaD" id="txtRazaD" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Toro</label>
                                                <input name="txtToro" id="txtToro" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza</label>
                                                <input name="txtRazaT" id="txtRazaT" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <input name="txtTipo" id="txtTipo" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>GI</label>
                                                <input name="txtGI" id="txtGI" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>GII</label>
                                                <input name="txtGII" id="txtGII" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>GIII</label>
                                                <input name="txtGIII" id="txtGIII" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Otros</label>
                                                <input name="txtOtros" id="txtOtros" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger" id="btnEliminar" name="btnEliminar" value="0" >Eliminar</button>
                                            <button type="submit" class="btn btn-primary" id="btnAgregar">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tblPlanilla" class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Donadora</th>
                                    <th>Raza</th>
                                    <th>Toro</th>
                                    <th>Raza</th>
                                    <th>Tipo</th>
                                    <th>GI</th>
                                    <th>GII</th>
                                    <th>GIII</th>
                                    <th>Otros</th>
                                    <th>Viables</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderDetail->aspiration->details as $detail)
                                        <tr>
                                            <td id="donor{{ $detail->id }}">{{ $detail->donor }}</td>
                                            <td id="donor_breed{{ $detail->id }}">{{ $detail->donor_breed }}</td>
                                            <td id="bull{{ $detail->id }}">{{ $detail->bull }}</td>
                                            <td id="bull_breed{{ $detail->id }}">{{ $detail->bull_breed }}</td>
                                            <td id="type{{ $detail->id }}">{{ $detail->type }}</td>
                                            <td id="gi{{ $detail->id }}">{{ $detail->gi }}</td>
                                            <td id="gii{{ $detail->id }}">{{ $detail->gii }}</td>
                                            <td id="giii{{ $detail->id }}">{{ $detail->giii }}</td>
                                            <td id="others{{ $detail->id }}">{{ $detail->others }}</td>
                                            <td>{{ ($detail->gi + $detail->gii + $detail->giii) }}</td>
                                            <td>{{ ($detail->others + ($detail->gi + $detail->gii + $detail->giii)) }}</td>
                                            <td class="center">
                                                @if ($orderDetail->aspiration->state == 0)
                                                    <button id="btnModal{{ $detail->id }}" name="btnModal"  type="button" class="btn btn-xs btn-warning" value = "{{ $detail->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                            @if ($orderDetail->aspiration->state == 0)
                                <div class="form-group col-lg-12" align="right">
                                    <form method="POST" action="{{ route('aspiration_finish', $orderDetail->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-w-m btn-primary" >Finalizar</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            $('#btnAgregar').on('click', function(){
                $('#formPlanilla').submit();
                /*var viables = (parseInt($('#txtGI').val()) + parseInt($('#txtGII').val()) + parseInt($('#txtGIII').val()));
                var tr = '<tr>';
                tr += '<td>' + $('#txtDonadora').val() + '</td>';
                tr += '<td>' + $('#txtRazaD').val() + '</td>';
                tr += '<td>' + $('#txtToro').val() + '</td>';
                tr += '<td>' + $('#txtRazaT').val() + '</td>';
                tr += '<td>' + $('#txtTipo').val() + '</td>';
                tr += '<td>' + $('#txtGI').val() + '</td>';
                tr += '<td>' + $('#txtGII').val() + '</td>';
                tr += '<td>' + $('#txtGIII').val() + '</td>';
                tr += '<td>' + $('#txtOtros').val() + '</td>';
                tr += '<td>' + viables + '</td>';
                tr += '<td>' + (parseInt($('#txtOtros').val()) + viables) + '</td>';
                tr += '<td>' + $('#txtToro').val() + '</td>';
                tr += '<td>' + $('#txtRaza').val() + '</td>';
                tr += '<td>{{-- $orderDetail->order->client->bussiness_name --}}</td>';
                tr += '</tr>';
                $('#tblPlanilla tbody').append(tr);*/
            });
        });

        $('#btnEliminar').click(function() {
            $('#btnEliminar').val(1);
            form.submit();
        });

        $('#btnAgregarM').on('click', function () {
            $('#myModal').modal('show');
            $('#btnEliminar').hide();
            $('#btnEliminar').val(0);
            $('#btnAgregar').html("Agregar");
            $(".modal-body input").val("");
        }) ;

        $("[id*=btnModal]").on('click', function () {
            $('#myModal').modal('show');
            $('#btnAgregar').html("Modificar");
            $('#btnEliminar').show();
            $('#txtAspirationId').val((this).value);
            $('#txtDonadora').val($('#donor'+(this).value).text());
            $('#txtRazaD').val($('#donor_breed'+(this).value).text());
            $('#txtToro').val($('#bull'+(this).value).text());
            $('#txtRazaT').val($('#bull_breed'+(this).value).text());
            $('#txtTipo').val($('#type'+(this).value).text());
            $('#txtGI').val($('#gi'+(this).value).text());
            $('#txtGII').val($('#gii'+(this).value).text());
            $('#txtGIII').val($('#giii'+(this).value).text());
            $('#txtOtros').val($('#others'+(this).value).text());
            $('#txtToro2').val($('#bull2'+(this).value).text());
            $('#txtRaza2').val($('#bull2_breed'+(this).value).text());
        });

        $('#btnEliminar').click(function() {
            $('#btnEliminar').val(1);
            form.submit();
        });

    </script>
@endsection