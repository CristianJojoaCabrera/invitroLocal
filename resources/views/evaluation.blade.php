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
                <li>
                    <a href="{{ route('evaluation_po') }}">Seleccion Receptoras</a>
                </li>
                <li class="active">
                    <strong>Planilla de Selección de Receptoras</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.head_po_detail')
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>Planilla de Selección de Receptoras</h5>
                    </div>
                    <div class="ibox-content">
                        @if ( $orderDetail->evaluation->state <> 1)
                            <button id="btnAgregarM" type="button" class="btn btn-primary"> <!--data-toggle="modal" data-target="#myModal" -->
                                Agregar
                            </button>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('evaluation_save', $orderDetail->id) }}">
                            {{ csrf_field() }}

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
                                                <input id="txtAnimal_id" name="txtAnimal_id" type="number"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Chapeta</label>
                                                <input id="txtChapeta" name="txtChapeta" type="text" class="form-control" value="{{ old('txtChapeta') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Diagnóstico</label>
                                                <input id="txtDiagnostic" name="txtDiagnostic" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Apta</label>
                                                <select class="form-control input-sm" id="cmbFit" name="cmbFit">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sincronizada</label>
                                                <select class="form-control input-sm" id="cmbSynchronized" name="cmbSynchronized">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
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
                                            <button type="submit" class="btn btn-primary" id="btnAgregar" name="btnAgregar" >Agregar</button>
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
                                        <th>Sincronizada</th>
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
                                            <td id="synchronized{{ $detail->id }}">@if($detail->synchronized == 1 )
                                                    Si
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td id="other_procedures{{ $detail->id }}">{{ $detail->other_procedures }}</td>
                                            <td id="comments{{ $detail->id }}">{{ $detail->comments }}</td>
                                            <td class="center">
                                                @if ( $orderDetail->evaluation->state <> 1)
                                                    <button id="btnModal{{ $detail->id }}" name="btnModal"  type="button" class="btn btn-xs btn-warning"
                                                            value = "{{ $detail->id }}">
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
                            </div>
                        </form>
                        @if ( $orderDetail->evaluation->state == 0)
                            <form method="POST" action="{{ route('evaluation_finish', $orderDetail->id) }}">
                                {{ csrf_field() }}
                                <div class="ibox-content" align="right">
                                    <button type="submit" class="btn btn-w-m btn-primary" >Finalizar</button>
                                </div>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#btnFinalizar').val(0);

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

                if( $.trim($('#fit'+(this).value).text()) == 'Si' ){
                    $('#cmbFit').val(1);
                }else{
                    $('#cmbFit').val(0);
                };

                if( $.trim($('#synchronized'+(this).value).text()) == 'Si' ){
                    $('#cmbSynchronized').val(1);
                }else{
                    $('#cmbSynchronized').val(0);
                };

                $('#txtOther_procedures').val($('#other_procedures'+(this).value).text());
                $('#txtComments').val($('#comments'+(this).value).text());
            });

            $('#btnEliminar').click(function() {
                $('#btnEliminar').val(1);

            });
        });


    </script>
@endsection

