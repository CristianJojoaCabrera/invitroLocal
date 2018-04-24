@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Selección Receptoras</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Planilla de Selección de Receptoras</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <form method="POST" action="{{ route('create_evaluation') }}">
            <div class="row">
                {{ csrf_field() }}
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
                                <div class="form-group col-lg-2">
                                    <label>Orden de producción</label>
                                    <input type="text" class="form-control input-sm" value="{{ $productionOrder->id }}" id="txtOrder_id" name="txtOrder_id" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Cliente</label>
                                    <input type="text" class="form-control input-sm" value="{{ $productionOrder->client->bussiness_name }}" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control input-sm" value="{{ $productionOrder->client->city }}" readonly>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label>Fecha</label>
                                    <input type="text" class="form-control input-sm" value="{{ date('Y-m-d') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Planilla de Selección de Receptoras</h5>
                        </div>
                        <div class="ibox-content">
                            <button id="btnModalAgregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Agregar
                            </button>
                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Planilla de Selección de Receptoras</h4>
                                            <small class="font-bold"></small>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Id. Animal</label>
                                                <input id="txtAnimal_id" name="txtAnimal_id" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Chapeta</label>
                                                <input id="txtChapeta" name="txtChapeta" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Diagnóstico</label>
                                                <input id="txtDiagnostic" name="txtDiagnostic" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Apta</label>
                                                <input id="txtFit" name="txtFit" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Otros Procedimientos</label>
                                                <input id="txtOther_procedures" name="txtOther_procedures" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                <input id="txtComments" name="txtComments" type="text" class="form-control">
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
                                        <th>No</th>
                                        <th>ID. Animal</th>
                                        <th>Chapeta</th>
                                        <th>Diagnóstico</th>
                                        <th>Apta</th>
                                        <th>Otros Procedimientos</th>
                                        <th>Observaciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                            <div class="ibox-content" align="right">
                                <button type="submit" class="btn btn-w-m btn-primary">Guardar Planilla</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#btnAgregar').on('click', function () {
                var tr = '<tr>';
                tr += '<td></td>';
                tr += '<td>' + $('#txtAnimal_id').val() + '</td>';
                tr += '<td>' + $('#txtChapeta').val() + '</td>';
                tr += '<td>' + $('#txtDiagnostic').val() + '</td>';
                tr += '<td>' + $('#txtFit').val() + '</td>';
                tr += '<td>' + $('#txtOther_procedures').val() + '</td>';
                tr += '<td>' + $('#txtComments').val() + '</td>';
                tr += '</tr>';
                $('#tblPlanilla tbody').append(tr);
            });

            $('#myModal').on('hidden.bs.modal', function(e){
                $(".modal-body input").val("")
            }) ;

        });
    </script>
@endsection

