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
                                <input type="text" class="form-control input-sm" value="{{ $productionOrder->id }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Cliente</label>
                                <input type="text" class="form-control input-sm" value="{{ $productionOrder->bussiness_name }}">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Fecha</label>
                                <input type="text" class="form-control input-sm" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Finca</label>
                                <input type="text" class="form-control input-sm" value="">
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
                                        <div class="form-group">
                                            <label>Donadora</label>
                                            <input id="txtDonadora" type="text" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Raza</label>
                                            <input id="txtRazaD" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Toro</label>
                                            <input id="txtToro" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Raza</label>
                                            <input id="txtRazaT" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <input id="txtTipo" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>GI</label>
                                            <input id="txtGI" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>GII</label>
                                            <input id="txtGII" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>GIII</label>
                                            <input id="txtGIII" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>GIII</label>
                                            <input id="txtOtros" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Viables</label>
                                            <input id="txtViables" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Toro</label>
                                            <input id="txtToro" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Raza</label>
                                            <input id="txtRaza" type="text" class="form-control">
                                        </div>
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
                                    <th>Local</th>
                                </tr>
                                </thead>
                                <tbody>

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
                tr += '<td>' + $('#txtViables').val() + '</td>';
                tr += '<td>' + $('#txtTotal').val() + '</td>';
                tr += '<td>' + $('#txtToro').val() + '</td>';
                tr += '<td>' + $('#txtRaza').val() + '</td>';
                tr += '<td>' + $('#txtGIII').val() + '</td>';
                tr += '</tr>';
                $('#tblPlanilla tbody').append(tr);
            });
        });
    </script>
@endsection