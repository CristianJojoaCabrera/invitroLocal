@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Transferencia de Embriones</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Transferencia de Embriones</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.head_po_detail')

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Planilla de Transferencia de Embriones</h5>
                    </div>
                    <div class="ibox-content">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('transfer_save', $orderDetail-> id) }}">
                            {{ csrf_field() }}

                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Planilla de Selección de Receptoras</h4>
                                            <input id="txtEvaluation_id" name="txtEvaluation_id" type="hidden" value="" class="form-control">
                                            <input id="txtTransfer_id" name="txtTransfer_id" type="hidden" value="" class="form-control">
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Receptora</label>
                                                <input id="txtReceptora" name="txtReceptora" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Embrion</label>
                                                <input id="txtEmbrion" name="txtEmbrion" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Clasificación del Embrion</label>
                                                <input id="txtClaseEmbrion" name="txtClaseEmbrion" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Cuerpo Luteo</label>
                                                <input id="txtCuerpoLuteo" name="txtCuerpoLuteo" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Donadora (RGD/Nombre)</label>
                                                <input id="txtDonadoraRGD" name="txtDonadoraRGD" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza Donadora</label>
                                                <input id="txtRazaDonadora" name="txtRazaDonadora" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Toro (RGD/Nombre)</label>
                                                <input id="txtToroRGD" name="txtToroRGD" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza Toro</label>
                                                <input id="txtRazaToro" name="txtRazaToro" type="text"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Observaciones para examen</label>
                                                <input id="txtComments" name="txtComments" type="textArea" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" id="btnAgregar" name="btnAgregar" >Modificar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tblPlanilla" class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Receptora</th>
                                        <th>Embrión</th>
                                        <th>Clasificación del Embrión</th>
                                        <th>Cuerpo Luteo</th>
                                        <th>Donadora (RGD/Nombre)</th>
                                        <th>Raza</th>
                                        <th>Toro (RGD/Nombre)</th>
                                        <th>Raza</th>
                                        <th>Obs. Para examen</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetail->evaluation->detailsSynchronized as $detail)
                                        <tr>
                                            <td id="id{{ $detail->id }}">{{ $detail->id}}</td>
                                            <td id="id{{ $detail->id }}">{{ $detail->id }}</td>
                                            <td id="chapeta{{ $detail->id }}">{{ $detail->chapeta }}</td>
                                            <td id="embryo{{ $detail->id }}">{{ $detail->embryo }}</td>
                                            <td id="embryo_class{{ $detail->id }}">{{ $detail->embryo_class }}</td>
                                            <td id="corpus_luteum{{ $detail->id }}">{{ $detail->corpus_luteum }}</td>
                                            <td id="donor{{ $detail->id }}">{{ $detail->donor }}</td>
                                            <td id="donor_breed{{ $detail->id }}">{{ $detail->donor_breed }}</td>
                                            <td id="bull{{ $detail->id }}">{{ $detail->bull }}</td>
                                            <td id="bull_breed{{ $detail->id }}">{{ $detail->bull_breed }}</td>
                                            <td id="comments{{ $detail->id }}">{{ $detail->comments }}</td>
                                            <td class="center">
                                                @if ( $orderDetail->evaluation->state == 1)
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
                        @if ( $orderDetail->evaluation->state == 1)
                            <form method="POST" action="{{ route('transfer_finish', $orderDetail->id) }}">
                                {{ csrf_field() }}
                                <div class="ibox-content" align="right">
                                    <button type="submit" class="btn btn-w-m btn-primary" >Finalizar</button>
                                </div>
                            </form>
                        @endif

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Recibido por</label>
                                    <input type="text" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Cédula</label>
                                    <input type="text" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <textarea class="form-control input-sm"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $("[id*=btnModal]").on('click', function () {
                $('#myModal').modal('show');
                $('#txtEvaluation_id').val((this).value);
                $('#txtReceptora').val($('#chapeta'+(this).value).text());
                $('#txtEmbrion').val($('#embryo'+(this).value).text());
                $('#txtClaseEmbrion').val($('#embryo_class'+(this).value).text());
                $('#txtCuerpoLuteo').val($('#corpus_luteum'+(this).value).text());
                $('#txtDonadoraRGD').val($('#donor'+(this).value).text());
                $('#txtRazaDonadora').val($('#donor_breed'+(this).value).text());
                $('#txtToroRGD').val($('#bull'+(this).value).text());
                $('#txtRazaToro').val($('#bull_breed'+(this).value).text());
                $('#txtComments').val($('#comments'+(this).value).text());
            });
        });
    </script>
@endsection
