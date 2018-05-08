@extends('layouts.home')

@section('title', 'Inicio')

@section('css')
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Órdenes de Producción</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Órdenes de Producción</strong>
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
                        <h5>Órdenes de Producción</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th># Orden</th>
                                    <th>Razón Social</th>
                                    <th>Local</th>
                                    @if ($route == '')
                                        <th>Aprobada</th>
                                    @endif
                                    <th></th>
                                    @if ($route == 'evaluation')
                                        <th></th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($productionOrders as $productionOrder)
                                    @if ($route == 'transfer')
                                        @php $details = $productionOrder->detailsforTransfer  @endphp
                                    @else
                                        @php $details = $productionOrder->details @endphp
                                    @endif

                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $productionOrder->id }}</td>
                                            <td>{{ $productionOrder->client->bussiness_name }}</td>
                                            <td>{{ $detail->local->name }}</td>
                                            <td>
                                                @if (($route == 'evaluation') )
                                                    <a href="{{ route($route, $detail->id) }}" class="btn btn-sm btn-warning {{($detail->apply_evaluation) ? '' : 'disabled'}}">Planilla</a>
                                                    </td>
                                                    <td>
                                                    @if ($detail->evaluation == '' )
                                                        <a href="{{ route('evaluation_notApply', $detail->id) }}" class="btn btn-sm btn-danger {{($detail->apply_evaluation) ? '' : 'disabled'}}">No Aplica</a>
                                                    @else
                                                        <a href="{{ route('evaluation_notApply', $detail->id) }}" class="btn btn-sm btn-danger disabled ">No Aplica</a>
                                                    @endif
                                                @else
                                                    <a href="{{ route($route, $detail->id) }}" class="btn btn-sm btn-warning">Planilla</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection