@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Producción de Embriones</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Producción de Embriones</strong>
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
                            <div class="form-group col-lg-2">
                                <label>Orden</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->id }}" disabled>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Cliente</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->client->bussiness_name }}" disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Fecha Miv</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->created_at }}" disabled>
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Finca</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->name }}" disabled>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Número de Receptoras</label>
                                <input type="text" class="form-control input-sm"  disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Lote Medio MIV</label>
                                <input type="text" class="form-control input-sm"  value="{{ $orderDetail->aspiration->medium_lot_miv }}" disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Medio OPU</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->medium_opu }}" disabled>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Lote Medio OPU</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->medium_lot_opu }}" disabled>
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Aspirador</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->aspirator }}" disabled>
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Buscador</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->searcher }}" disabled>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Hora Llegada</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->arrived_time }}" disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Temperatura Llegada</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->arrived_temperature }}" disabled>
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Nombre quien recibe</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->receiver_name }}" disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Tipo de transporte</label>
                                <input type="text" class="form-control input-sm" value="{{ $orderDetail->aspiration->transport_type }}" disabled>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Lote Aceite</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Planilla de Producción de Embriones</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Planilla de Producción de Embrión</h4>
                                    </div>
                                    <form id="formPlanilla" method="POST" action="{{ route('production_save', $orderDetail->id) }}">
                                        {{ csrf_field() }}
                                        <input id="txtAspirationId" name="txtAspirationId" type="hidden" value="" class="form-control">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Toro</label>
                                                <input name="txtToro2" id="txtToro2" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza</label>
                                                <input name="txtRaza2" id="txtRaza2" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>CIV</label>
                                                <input name="txtCIV" id="txtCIV" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Medio de Cultivo</label>
                                                <input name="txtMedioCultivo" id="txtMedioCultivo" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Lote Medio</label>
                                                <input name="txtLoteMedio" id="txtLoteMedio" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Cliv</label>
                                                <input name="txtCliv" id="txtCliv" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>1F</label>
                                                <input name="txt1F" id="txt1F" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>2F</label>
                                                <input name="txt2F" id="txt2F" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>C5</label>
                                                <input name="txtC5" id="txtC5" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Prev</label>
                                                <input name="txtPrev" id="txtPrev" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Bi</label>
                                                <input name="txtBi" id="txtBi" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Bl</label>
                                                <input name="txtBl" id="txtBl" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Bx</label>
                                                <input name="txtBx" id="txtBx" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Bn</label>
                                                <input name="txtBn" id="txtBn" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Be</label>
                                                <input name="txtBe" id="txtBe" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Vitri</label>
                                                <input name="txtVitri" id="txtVitri" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Cong</label>
                                                <input name="txtCOng" id="txtCOng" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Perda</label>
                                                <input name="txtPerda" id="txtPerda" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>TE</label>
                                                <input name="txtTE" id="txtTE" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Desc</label>
                                                <input name="txtDesc" id="txtDesc" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input name="txtTotal" id="txtTotal" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Bl</label>
                                                <input name="txtBl" id="txtBl" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Donadora</th>
                                    <th>Raza</th>
                                    <th>GI</th>
                                    <th>GII</th>
                                    <th>GIII</th>
                                    <th>Otros</th>
                                    <th>Viables</th>
                                    <th>Total</th>
                                    <th>Toro</th>
                                    <th>Raza</th>
                                    <th>Local</th>
                                    <th>CIV</th>
                                    <th>Medio Cultivo</th>
                                    <th>Lote Medio</th>
                                    <th>Cliv</th>
                                    <th>1 F</th>
                                    <th>2 F</th>
                                    <th>C5</th>
                                    <th>Prev</th>
                                    <th>Bi</th>
                                    <th>Bl</th>
                                    <th>Bx</th>
                                    <th>Bn</th>
                                    <th>Be</th>
                                    <th>Vitri</th>
                                    <th>Cong</th>
                                    <th>Perda</th>
                                    <th>TE</th>
                                    <th>Desc</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderDetail->aspiration->details as $detail)
                                    <tr>
                                        <td id="donor{{ $detail->id }}">
                                            <button id="btnModal{{ $detail->id }}" name="btnModal"  type="button" class="btn btn-xs btn-warning" value = "{{ $detail->id }}">
                                                {{ $detail->id }}
                                            </button>
                                        </td>
                                        <td id="donor{{ $detail->id }}">{{ $detail->donor }}</td>
                                        <td id="donor_breed{{ $detail->id }}">{{ $detail->donor_breed }}</td>
                                        <td id="gi{{ $detail->id }}">{{ $detail->gi }}</td>
                                        <td id="gii{{ $detail->id }}">{{ $detail->gii }}</td>
                                        <td id="giii{{ $detail->id }}">{{ $detail->giii }}</td>
                                        <td id="others{{ $detail->id }}">{{ $detail->others }}</td>
                                        <td>{{ ($detail->gi + $detail->gii + $detail->giii) }}</td>
                                        <td>{{ ($detail->others + ($detail->gi + $detail->gii + $detail->giii)) }}</td>
                                        <td id="bull2{{ $detail->id }}"></td>
                                        <td id="bull2_breed{{ $detail->id }}"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--<tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>20</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>-->
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
        });
    </script>
@endsection