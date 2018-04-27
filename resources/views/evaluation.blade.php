@extends('layouts.home')

@section('title', 'Inicio')

@section('css')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/fullcalendar/fullcalendar.print.css') }}" rel='stylesheet' media='print'>
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">

@endsection

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
        <form method="POST" action="{{ route('evaluation_save', $orderDetail->id) }}">
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
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->id }}" id="txtOrder_id" name="txtOrder_id" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Cliente</label>
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->client->bussiness_name }}" readonly>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label>Local</label>
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->name }}" readonly>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->city }}" readonly>
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
                            <button id="btnAgregarM" type="button" class="btn btn-primary"> <!--data-toggle="modal" data-target="#myModal" -->
                                Agregar
                            </button>
                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Planilla de Selección de Receptoras</h4>
                                            <input id="txtEvaluation_id" name="txtEvaluation_id" type="hidden" value="" class="form-control">
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
                                                <!--<input id="txtFit" name="txtFit" type="text" class="form-control">-->
                                                <select class="form-control input-sm" id="cmbFit" name="cmbFit">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                                <!--<label> <input id="chkFit" name="chkFit" type="checkbox" class="i-checks">  Apta  </label> -->
                                            </div>
                                            <div class="form-group">
                                                <label>Otros Procedimientos</label>
                                                <input id="txtOther_procedures" name="txtOther_procedures" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                <input id="txtComments" name="txtComments" type="textArea" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger" id="btnEliminar" name="btnEliminar" value="0" >Eliminar</button>
                                            <!--<button type="button" class="btn btn-primary" id="btnAgregar" data-dismiss="modal">Agregar</button> -->
                                            <button type="submit" class="btn btn-primary"id="btnAgregar" name="btnAgregar" >Agregar</button>
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
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetail->evaluation->details as $detail)
                                        <tr>
                                            <td id="id{{ $detail->id }}">{{ $detail->id }}</td>
                                            <td id="animal_id{{ $detail->id }}">{{ $detail->animal_id }}</td>
                                            <td id="chapeta{{ $detail->id }}">{{ $detail->chapeta }}</td>
                                            <td id="diagnostic{{ $detail->id }}">{{ $detail->diagnostic }}</td>
                                            <td id="fit{{ $detail->id }}">@if($detail->fit == 1 )
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td id="other_procedures{{ $detail->id }}">{{ $detail->other_procedures }}</td>
                                            <td id="comments{{ $detail->id }}">{{ $detail->comments }}</td>
                                            <td class="center">
                                                <button id="btnModal{{ $detail->id }}" name="btnModal"  type="button" class="btn btn-xs btn-warning"
                                                        value = "{{ $detail->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                            <!--
                            <div class="ibox-content" align="right">
                                <button type="submit" class="btn btn-w-m btn-primary">Guardar Planilla</button>
                            </div>
data-toggle="modal" data-target="#myModal"

                            -->
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <!-- iCheck -->
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            //$('#myModal').on('hidden.bs.modal', function(e){
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

                $('#txtEvaluation_id').val((this).value);
                $('#txtAnimal_id').val($('#animal_id'+(this).value).text());
                $('#txtChapeta').val($('#chapeta'+(this).value).text());
                $('#txtDiagnostic').val($('#diagnostic'+(this).value).text());

                if( $('#fit'+(this).value).text() == 'Si' ){
                    $('#cmbFit').val(1);
                }else{
                    $('#cmbFit').val(0);
                };

                $('#txtOther_procedures').val($('#other_procedures'+(this).value).text());
                $('#txtComments').val($('#comments'+(this).value).text());
            });

            $('#btnEliminar').click(function() {
                $('#btnEliminar').val(1);
                form.submit();
            });

            <!-- iCheck -->
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        });


    </script>
@endsection

