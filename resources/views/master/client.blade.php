@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Cliente</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="index.html">Maestros</a>
                </li>
                <li class="active">
                    <strong>Clientes</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">

                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Clientes</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Nuevo</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Tipo Id.</th>
                                            <th>Número Id.</th>
                                            <th>Razón Social</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Móvil</th>
                                            <th>Correo</th>
                                            <th>Contacto</th>
                                            <th>Ciudad</th>
                                            <th>Cupo</th>
                                            <th>Plazo</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{ $client->identification_type_id }}</td>
                                                <td>{{ $client->identification_number }}</td>
                                                <td>{{ $client->bussiness_name }}</td>
                                                <td>{{ $client->address }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->cellphone }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->contact }}</td>
                                                <td>{{ $client->city }}</td>
                                                <td>{{ $client->quota }}</td>
                                                <td>{{ $client->payment_deadline }}</td>
                                                <td class="center">
                                                    <button type="button" class="btn btn-xs btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <form method="POST" action="{{ route('create_master_client') }}">
                                    <div class="row">
                                        {{ csrf_field() }}
                                        <div class="col-lg-12">
                                            <div class="panel-group" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Información</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <div class="form-group col-lg-4">
                                                                <label>Tipo Identificación</label>
                                                                <select class="form-control input-sm" name="cmbTypeId">
                                                                    <option>Seleccione</option>
                                                                    @foreach($documentTypes as $documentType)
                                                                        <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Número Identificación</label>
                                                                <input type="text" class="form-control input-sm" name="txtNumId">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Razón Social</label>
                                                                <input type="text" class="form-control input-sm" name="txtBussinessName">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Dirección</label>
                                                                <input type="text" class="form-control input-sm" name="txtAddress">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Teléfono</label>
                                                                <input type="text" class="form-control input-sm" name="txtPhone">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Móvil</label>
                                                                <input type="text" class="form-control input-sm" name="txtCellphone">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Correo Electrónico</label>
                                                                <input type="text" class="form-control input-sm" name="txtEmail">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Contacto</label>
                                                                <input type="text" class="form-control input-sm" name="txtContact">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Cargo</label>
                                                                <input type="text" class="form-control input-sm" name="txtPosition">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Ciudad</label>
                                                                <input type="text" class="form-control input-sm" name="txtCity">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Departamento</label>
                                                                <input type="text" class="form-control input-sm" name="txtDepartment">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Cupo disponible</label>
                                                                <input type="text" class="form-control input-sm" name="txtQuota">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label>Plazo de Pago</label>
                                                                <input type="text" class="form-control input-sm" name="txtDeadlinePayment">
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                <label># Inventario Semen</label>
                                                                <input type="text" class="form-control input-sm" name="txtSummary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Locales</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Nombre del local" id="txtNewLocalName">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Contacto" id="txtNewLocalContact">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Teléfono" id="txtNewLocalPhone">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Correo" id="txtNewLocalEmail">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Ciudad" id="txtNewLocalCity">
                                                                </div>
                                                            </div>
                                                            <div class="form-inline m-b">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Departamento" id="txtNewLocalDepartment">
                                                                </div>
                                                            </div>
                                                            <div class="form-inline m-b">
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-primary" id="btnNewLocal">Agregar</button>
                                                                </div>
                                                            </div>
                                                            <table id="tblLocals" class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Nombre del Local</th>
                                                                    <th>Ciudad</th>
                                                                    <th>Departamento</th>
                                                                    <th>Teléfono</th>
                                                                    <th>Correo</th>
                                                                    <th>Contacto</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Servicios</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <table class="table table-striped table-bordered" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Valor</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($services as $service)
                                                                    <tr>
                                                                        <td>{{ $service->name }}</td>
                                                                        <td>
                                                                            <div class="input-group m-b">
                                                                                <span class="input-group-addon">$</span>
                                                                                <input type="number" class="form-control" name="txtService[{{ $service->id }}]" value="0">
                                                                                <span class="input-group-addon">.00</span>
                                                                            </div>
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
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <button type="submit" class="btn btn-w-m btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>
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
            $('#btnNewLocal').on('click', function () {
                var tr = '<tr>';
                tr += '<td>';
                tr += $('#txtNewLocalName').val();
                tr += '<input type="hidden" name="txtLocalName[]" value="' + $('#txtNewLocalName').val() + '">';
                tr += '</td>';
                tr += '<td>'
                tr += $('#txtNewLocalCity').val();
                tr += '<input type="hidden" name="txtLocalCity[]" value="' + $('#txtNewLocalCity').val() + '">';
                tr += '</td>';
                tr += '<td>';
                tr += $('#txtNewLocalDepartment').val();
                tr += '<input type="hidden" name="txtLocalDepartment[]" value="' + $('#txtNewLocalDepartment').val() + '">';
                tr += '</td>';
                tr += '<td>';
                tr += $('#txtNewLocalPhone').val();
                tr += '<input type="hidden" name="txtLocalPhone[]" value="' + $('#txtNewLocalPhone').val() + '">';
                tr += '</td>';
                tr += '<td>';
                tr += $('#txtNewLocalEmail').val();
                tr += '<input type="hidden" name="txtLocalEmail[]" value="' + $('#txtNewLocalEmail').val() + '">';
                tr += '</td>';
                tr += '<td>';
                tr += $('#txtNewLocalContact').val();
                tr += '<input type="hidden" name="txtLocalContact[]" value="' + $('#txtNewLocalContact').val() + '">';
                tr += '</td>';
                tr += '</tr>';
                $('#tblLocals tbody').append(tr);
                $('#txtNewLocalName, #txtNewLocalCity, #txtNewLocalDepartment, #txtNewLocalPhone, #txtNewLocalEmail, #txtNewLocalContact').val('');
            });
        });

    </script>
@endsection