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
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Preorden de Producción</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    Preorden de Producción
                </li>
                <li class="active">
                    <strong>Aprobar</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Preorden de Producción</h5>
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
                        <div class="row">
                            <form id="form" method="POST" action="{{ route('approve_production_order') }}" class="panel">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="txtOrderId" value="{{ $order->id }}">
                                    <p>Fecha <label id="lblOrderDate">{{ $order->created_at }}</label></p>
                                    <p>Número Identificación <label id="lblIdNumber">{{ $order->client->identification_number }}</label></p>
                                    <p>Razón Social <label id="lblBussinessName">{{ $order->client->bussiness_name }}</label></p>
                                    <p>Dirección <label id="lblAddress">{{ $order->client->address }}</label></p>
                                    <p>Teléfono <label id="lblPhone">{{ $order->client->phone }}</label></p>
                                    <p>Móvil <label id="lblCellphone">{{ $order->client->cellphone }}</label></p>
                                    <p>Correo Electrónico <label id="lblEmail">{{ $order->client->email }}</label></p>
                                    <p>Contacto <label id="lblContact">{{ $order->client->contact }}</label></p>
                                    <p>Cargo <label id="lblPosition">{{ $order->client->position }}</label></p>
                                    <p>Ciudad <label id="lblCity">{{ $order->client->city }}</label></p>
                                    <p>Departamento <label id="lblDepartment">{{ $order->client->department }}</label></p>
                                    <p>Cupo Disponible <label id="lblQuota">{{ $order->client->quota }}</label></p>
                                    <p>Locales</p>
                                    <table id="tblFinalLocals" class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Nombre del local</th>
                                            <th>Ciudad</th>
                                            <th>Departamento</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Contacto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->details as $detail)
                                            <tr>
                                                <td>
                                                    {{ $detail->local->name }}
                                                </td>
                                                <td>
                                                    {{ $detail->local->city }}
                                                </td>
                                                <td>
                                                    {{ $detail->local->department }}
                                                </td>
                                                <td>
                                                    {{ $detail->local->phone }}
                                                </td>
                                                <td>
                                                    {{ $detail->local->email }}
                                                </td>
                                                <td>
                                                    {{ $detail->local->contact }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <p>Servicios</p>
                                    <table id="tblFinalServices" class="table table-striped table-bordered table-hover dataTables-example" disabled>
                                        <thead>
                                        <tr>
                                            <th>Servicio</th>
                                            <th>Subservicio</th>
                                            <th>Valor</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->subservices as $orderSubservice)
                                            <tr>
                                                <td>{{ $orderSubservice->service->name }}</td>
                                                <td>{{ $orderSubservice->subservice->name }}</td>
                                                <td>{{ $orderSubservice->value }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Aprobar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/plugins/fullcalendar/moment.min.js') }}"></script>
@endsection

@section('javascript')
    <!-- jQuery UI  -->
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Steps -->
    <script src="{{ asset('js/plugins/steps/jquery.steps.min.js') }}"></script>

    <!-- Jquery Validate -->
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

    <script>
        $(document).ready(function(){

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        });

    </script>
@endsection