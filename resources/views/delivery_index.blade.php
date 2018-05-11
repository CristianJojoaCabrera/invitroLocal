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
            <h2>Entrega</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Entrega</strong>
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
                                    <th>Fecha Diagnóstico</th>
                                    <th>Fecha Sexaje</th>
                                    <th>Planilla</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sexages as $sexage)
                                    <tr>
                                        <td>{{ $sexage->id }}</td>
                                        <td>{{ $sexage->orderDetail->order->client->bussiness_name }}</td>
                                        <td>{{ $sexage->orderDetail->local->name }}</td>
                                        <td>{{ $sexage->updated_at  }}</td>
                                        <td>
                                            @if(is_null($sexage->orderDetail->delivery))

                                            @else
                                                @if ($sexage->orderDetail->delivery->state == 1)
                                                    {{$sexage->orderDetail->delivery->updated_at}}
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if(is_null($sexage->orderDetail->delivery))
                                                <a href="{{ route($route, $sexage->orderDetail->id ) }}" class="btn btn-sm btn-warning">Pendiente</a>
                                            @else
                                                @if ($sexage->orderDetail->delivery->state == 0)
                                                    <a href="{{ route($route, $sexage->orderDetail->id ) }}" class="btn btn-sm btn-warning">Pendiente</a>
                                                @else
                                                    <a href="{{ route($route, $sexage->orderDetail->id ) }}" class="btn btn-sm btn-success">Finalizada</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
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