@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Producción de Embriones</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
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
                            <form method="post" action="{{ route('production_store', $orderDetail->id) }}">
                                {{ csrf_field() }}
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
                                    <label>Lote Acéite</label>
                                    <input type="text" class="form-control input-sm" name="txtLotOil" value="{{ $orderDetail->production->lot_oil}}" {{ ( $orderDetail->production->state == 0) ? '' : 'disabled' }}>
                                </div>
                                @if ($orderDetail->production->state == 0)
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
                                        <input id="txtAspirationDetailId" name="txtAspirationDetailId" type="hidden" value="" class="form-control">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Toro</label>
                                                <input name="txtToro" id="txtToro" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Raza</label>
                                                <input name="txtRaza" id="txtRaza" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>CIV</label>
                                                <input name="txtCIV" id="txtCIV" type="number" class="form-control">
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
                                                <label>Clivaje</label>
                                                <input name="txtCliv" id="txtCliv" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>1 Feeding</label>
                                                <input name="txt1F" id="txt1F" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>2 Feeding</label>
                                                <input name="txt2F" id="txt2F" type="number" class="form-control">
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
                                                <label>Vitrificados</label>
                                                <input name="txtVitri" id="txtVitri" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Congelados</label>
                                                <input name="txtCong" id="txtCong" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Pérdida</label>
                                                <input name="txtPerda" id="txtPerda" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Embriones transferidos</label>
                                                <input name="txtTE" id="txtTE" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Descartados</label>
                                                <input name="txtDesc" id="txtDesc" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Donadora</th>
                                    <th rowspan="2">Raza</th>
                                    <th rowspan="2">GI</th>
                                    <th rowspan="2">GII</th>
                                    <th rowspan="2">GIII</th>
                                    <th rowspan="2">Otros</th>
                                    <th rowspan="2">Viables</th>
                                    <th rowspan="2">Total</th>
                                    <th rowspan="2">Toro</th>
                                    <th rowspan="2">Raza</th>
                                    <th rowspan="2">CIV</th>
                                    <th rowspan="2">Medio Cultivo</th>
                                    <th rowspan="2">Lote Medio</th>
                                    <th rowspan="2">Cliv</th>
                                    <th rowspan="2">1F</th>
                                    <th rowspan="2">2F</th>
                                    <th rowspan="2">C5</th>
                                    <th rowspan="2">Prev</th>
                                    <th colspan="5">Clasificación Embriones Empacados</th>
                                    <th rowspan="2">Vitri</th>
                                    <th rowspan="2">Cong</th>
                                    <th rowspan="2">Perda</th>
                                    <th rowspan="2">TE</th>
                                    <th rowspan="2">Desc</th>
                                    <th rowspan="2">Total</th>
                                </tr>
                                <tr>
                                    <th>Bi</th>
                                    <th>Bl</th>
                                    <th>Bx</th>
                                    <th>Bn</th>
                                    <th>Be</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderDetail->aspiration->details as $detail)
                                    <tr>
                                        <td>
                                            @if ($orderDetail->production->state == 0)
                                                <button id="btnModal{{ $detail->id }}" name="btnModal"  type="button" class="btn btn-xs btn-warning" value = "{{ $detail->id }}">
                                                    {{ $detail->id }}
                                                </button>
                                            @else
                                                {{ $detail->id }}
                                            @endif
                                        </td>
                                        <td id="donor{{ $detail->id }}">{{ $detail->donor }}</td>
                                        <td id="donor_breed{{ $detail->id }}">{{ $detail->donor_breed }}</td>
                                        <td id="gi{{ $detail->id }}">{{ $detail->gi }}</td>
                                        <td id="gii{{ $detail->id }}">{{ $detail->gii }}</td>
                                        <td id="giii{{ $detail->id }}">{{ $detail->giii }}</td>
                                        <td id="others{{ $detail->id }}">{{ $detail->others }}</td>
                                        <td>{{ ($detail->gi + $detail->gii + $detail->giii) }}</td>
                                        <td>{{ ($detail->others + ($detail->gi + $detail->gii + $detail->giii)) }}</td>
                                        @if ($detail->productionDetail != null)
                                            <td id="bull2{{ $detail->id }}">{{ $detail->productionDetail->bull }}</td>
                                            <td id="bull2_breed{{ $detail->id }}">{{ $detail->productionDetail->bull_breed }}</td>
                                            <td id="civ{{ $detail->id }}">{{ $detail->productionDetail->civ }}</td>
                                            <td id="medium_cultivation{{ $detail->id }}">{{ $detail->productionDetail->medium_cultivation }}</td>
                                            <td id="lot_medium{{ $detail->id }}">{{ $detail->productionDetail->lot_medium }}</td>
                                            <td id="cleavage{{ $detail->id }}">{{ $detail->productionDetail->cleavage }}</td>
                                            <td id="feeding1{{ $detail->id }}">{{ $detail->productionDetail->feeding1 }}</td>
                                            <td id="feeding2{{ $detail->id }}">{{ $detail->productionDetail->feeding2 }}</td>
                                            <td id="c5{{ $detail->id }}">{{ $detail->productionDetail->c5 }}</td>
                                            <td id="prevision{{ $detail->id }}">{{ $detail->productionDetail->prevision }}</td>
                                            <td id="bi{{ $detail->id }}">{{ $detail->productionDetail->bi }}</td>
                                            <td id="bl{{ $detail->id }}">{{ $detail->productionDetail->bl }}</td>
                                            <td id="bx{{ $detail->id }}">{{ $detail->productionDetail->bx }}</td>
                                            <td id="bn{{ $detail->id }}">{{ $detail->productionDetail->bn }}</td>
                                            <td id="be{{ $detail->id }}">{{ $detail->productionDetail->be }}</td>
                                            <td id="vitrified{{ $detail->id }}">{{ $detail->productionDetail->vitrified }}</td>
                                            <td id="frozen{{ $detail->id }}">{{ $detail->productionDetail->frozen }}</td>
                                            <td id="lost{{ $detail->id }}">{{ $detail->productionDetail->lost }}</td>
                                            <td id="transferred_embryos{{ $detail->id }}">{{ $detail->productionDetail->transferred_embryos }}</td>
                                            <td id="discarded{{ $detail->id }}">{{ $detail->productionDetail->discarded }}</td>
                                            <td>{{ $detail->productionDetail->vitrified + $detail->productionDetail->frozen + $detail->productionDetail->lost + $detail->productionDetail->transferred_embryos + $detail->productionDetail->discarded }}</td>
                                        @else
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
                                            <td></td>
                                        @endif

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
                            @if ($orderDetail->production->state == 0)
                                <div class="form-group col-lg-12" align="right">
                                    <form method="POST" action="{{ route('production_finish', $orderDetail->id) }}">
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
            $("[id*=btnModal]").on('click', function () {
                $('#myModal').modal('show');
                $('#btnAgregar').html("Modificar");
                $('#txtAspirationDetailId').val((this).value);
                $('#txtToro').val($('#bull2'+(this).value).text());
                $('#txtRaza').val($('#bull2_breed'+(this).value).text());
                $('#txtCIV').val($('#civ'+(this).value).text());
                $('#txtMedioCultivo').val($('#medium_cultivation'+(this).value).text());
                $('#txtLoteMedio').val($('#lot_medium'+(this).value).text());
                $('#txtCliv').val($('#cleavage'+(this).value).text());
                $('#txt1F').val($('#feeding1'+(this).value).text());
                $('#txt2F').val($('#feeding2'+(this).value).text());
                $('#txtC5').val($('#c5'+(this).value).text());
                $('#txtPrev').val($('#prevision'+(this).value).text());
                $('#txtBi').val($('#bi'+(this).value).text());
                $('#txtBl').val($('#bl'+(this).value).text());
                $('#txtBx').val($('#bx'+(this).value).text());
                $('#txtBn').val($('#bn'+(this).value).text());
                $('#txtBe').val($('#be'+(this).value).text());
                $('#txtVitri').val($('#vitrified'+(this).value).text());
                $('#txtCong').val($('#frozen'+(this).value).text());
                $('#txtPerda').val($('#lost'+(this).value).text());
                $('#txtTE').val($('#transferred_embryos'+(this).value).text());
                $('#txtDesc').val($('#discarded'+(this).value).text());
            });
        });
    </script>
@endsection