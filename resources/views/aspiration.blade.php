@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Aspiración Folicular</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
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
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Lote Medio MIV</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Medio OPU</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Lote Medio OPU</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Aspirador</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Buscador</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Hora Llegada</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Temperatura Llegada</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Nombre quien recibe</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Tipo de Transporte</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Planilla de Aspiración Folicular (OPU)</h5>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Agregar
                        </button>
                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Planilla de Apiración Folicular</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formPlanilla" method="POST" action="{{ route('aspiration_save', $orderDetail->id) }}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Donadora</label>
                                                <input name="txtDonadora" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza</label>
                                                <input name="txtRazaD" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Toro</label>
                                                <input name="txtToro" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza</label>
                                                <input name="txtRazaT" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <input name="txtTipo" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>GI</label>
                                                <input name="txtGI" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>GII</label>
                                                <input name="txtGII" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>GIII</label>
                                                <input name="txtGIII" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Otros</label>
                                                <input name="txtOtros" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Toro</label>
                                                <input name="txtToro2" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza</label>
                                                <input name="txtRaza2" type="text" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" id="btnAgregar" data-dismiss="modal">Agregar</button>
                                    </div>
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
                                    <th>Toro</th>
                                    <th>Raza</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderDetail->aspiration->details as $detail)
                                        <tr>
                                            <td>{{ $detail->donor }}</td>
                                            <td>{{ $detail->donor_breed }}</td>
                                            <td>{{ $detail->bull }}</td>
                                            <td>{{ $detail->bull_breed }}</td>
                                            <td>{{ $detail->type }}</td>
                                            <td>{{ $detail->gi }}</td>
                                            <td>{{ $detail->gii }}</td>
                                            <td>{{ $detail->giii }}</td>
                                            <td>{{ $detail->others }}</td>
                                            <td>{{ ($detail->gi + $detail->gii + $detail->giii) }}</td>
                                            <td>{{ ($detail->others + ($detail->gi + $detail->gii + $detail->giii)) }}</td>
                                            <td>{{ $detail->bull2 }}</td>
                                            <td>{{ $detail->bull2_breed }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
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
    </script>
@endsection