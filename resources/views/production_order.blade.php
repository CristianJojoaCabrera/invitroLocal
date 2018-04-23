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
            <h2>Nueva Orden de Producción</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    Orden de Producción
                </li>
                <li class="active">
                    <strong>Nueva</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Nueva Orden de Producción</h5>
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
                        <h2>
                            Nueva Orden de Producción
                        </h2>
                        <form id="form" method="POST" action="{{ route('save_production_order') }}" class="wizard-big">
                            {{ csrf_field() }}
                            <input type="hidden" name="txtClientId" value="{{ $client->id }}">
                            <h1>Cliente</h1>
                            <fieldset>
                                <h2>Información de Cliente</h2>
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label>Tipo de Cliente</label>
                                        <select class="form-control input-sm" id="cmbProjectType">
                                            <option value="">Seleccione</option>
                                            <option value="Comercial">Comercial</option>
                                            <option value="Proyecto">Proyecto</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-9">
                                        <label>Nombre del Proyecto</label>
                                        <input type="text" class="form-control input-sm" name="txtProjectName" id="txtProjectName">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label>Fecha</label>
                                        <input type="text" class="form-control input-sm" disabled value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Tipo de Identificación</label>
                                        <input type="text" class="form-control input-sm" name="txtIdType" id="txtIdType" value="{{ $client->documentType->name }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <label>Identificación</label>
                                        <input type="text" class="form-control" name="txtIdNumber" id="txtIdNumber" value="{{ $client->identification_number }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Razón Social</label>
                                        <input type="text" class="form-control" name="txtBussinessName" id="txtBussinessName" value="{{ $client->bussiness_name }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Dirección</label>
                                        <input type="text" class="form-control" name="txtAddress" id="txtAddress" value="{{ $client->address }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Teléfono</label>
                                        <input type="text" class="form-control" name="txtPhone" id="txtPhone" value="{{ $client->phone }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Móvil</label>
                                        <input type="text" class="form-control" name="txtCellphone" id="txtCellphone" value="{{ $client->cellphone }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Correo Electrónico</label>
                                        <input type="text" class="form-control" name="txtEmail" id="txtEmail" value="{{ $client->email }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Contacto</label>
                                        <input type="text" class="form-control" name="txtContact" id="txtContact" value="{{ $client->contact }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Cargo</label>
                                        <input type="text" class="form-control" name="txtPosition" id="txtPosition" value="{{ $client->position }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Ciudad</label>
                                        <input type="text" class="form-control" name="txtCity" id="txtCity" value="{{ $client->city }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Departamento</label>
                                        <input type="text" class="form-control" name="txtDepartment" id="txtDepartment" value="{{ $client->department }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Cupo Disponible</label>
                                        <input type="text" class="form-control" name="txtQuota" id="txtQuota" value="{{ $client->quota }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Observación</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Locales</a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="form-inline m-b">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Nombre" id="txtNewLocalName">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Ciudad" id="txtNewLocalCity">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Departamento" id="txtNewLocalDepartment">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Teléfono" id="txtNewLocalPhone">
                                                    </div>
                                                </div>
                                                <div class="form-inline m-b">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Correo" id="txtNewLocalEmail">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Contacto" id="txtNewLocalContact">
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
                                                        <th>Nombre</th>
                                                        <th>Ciudad</th>
                                                        <th>Departamento</th>
                                                        <th>Teléfono</th>
                                                        <th>Correo</th>
                                                        <th>Contacto</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($client->locals as $local)
                                                            <tr>
                                                                <td>
                                                                    {{ $local->name }}
                                                                    <input type="hidden" name="txtLocalName[]" value="{{ $local->name }}">
                                                                </td>
                                                                <td>
                                                                    {{ $local->city }}
                                                                    <input type="hidden" name="txtLocalCity[]" value="{{ $local->city }}">
                                                                </td>
                                                                <td>
                                                                    {{ $local->department }}
                                                                    <input type="hidden" name="txtLocalDepartment[]" value="{{ $local->department }}">
                                                                </td>
                                                                <td>
                                                                    {{ $local->phone }}
                                                                    <input type="hidden" name="txtLocalPhone[]" value="{{ $local->phone }}">
                                                                </td>
                                                                <td>
                                                                    {{ $local->email }}
                                                                    <input type="hidden" name="txtLocalEmail[]" value="{{ $local->email }}">
                                                                </td>
                                                                <td>
                                                                    {{ $local->contact }}
                                                                    <input type="hidden" name="txtLocalContact[]" value="{{ $local->contact }}">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <h1>Servicios</h1>
                            <fieldset>
                                <h2>Servicios</h2>
                                <div class="row">
                                    <table id="tblServices" class="table table-striped table-bordered" >
                                        <thead>
                                        <tr>
                                            <th>Servicio</th>
                                            <th>Subservicio</th>
                                            <th>Valor</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($client->services as $service)
                                            @foreach($service->service->subservices as $subservice)
                                                <tr>
                                                    <td>{{ $service->service->name }}</td>
                                                    <td>{{ $subservice->name }}</td>
                                                    <td>
                                                        <div class="input-group m-b">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="hidden" class="form-control" name="txtServiceId[]" value="{{ $service->id }}">
                                                            <input type="hidden" class="form-control" name="txtSubServiceId[]" value="{{ $subservice->id }}">
                                                            <input type="number" class="form-control" name="txtService[]" value="{{ ($service->service->name == $subservice->name) ? $service->amount : '' }}">
                                                            <span class="input-group-addon">.00</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <h1>Agenda</h1>
                            <fieldset>
                                <h2>Agenda</h2>
                                <div class="row">
                                    <div id="calendar"></div>
                                </div>
                            </fieldset>
                            <h1>Guardar Preorden</h1>
                            <fieldset>
                                <h2>Guardar Pre Orden de Producción</h2>
                                <p>Nombre del Proyecto<label id="lblProjectName"></label></p>
                                <p>Número Identificación <label id="lblIdNumber"></label></p>
                                <p>Razón Social <label id="lblBussinessName"></label></p>
                                <p>Dirección <label id="lblAddress"></label></p>
                                <p>Teléfono <label id="lblPhone"></label></p>
                                <p>Móvil <label id="lblCellphone"></label></p>
                                <p>Correo Electrónico <label id="lblEmail"></label></p>
                                <p>Contacto <label id="lblContact"></label></p>
                                <p>Cargo <label id="lblPosition"></label></p>
                                <p>Ciudad <label id="lblCity"></label></p>
                                <p>Departamento <label id="lblDepartment"></label></p>
                                <p>Cupo Disponible <label id="lblQuota"></label></p>
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
                                    <tbody></tbody>
                                </table>
                                <p>Servicios</p>
                                <table id="tblFinalServices" class="table table-striped table-bordered table-hover dataTables-example" disabled>
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Servicio</th>
                                        <th>Subservicio</th>
                                        <th>Valor</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </fieldset>
                        </form>
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

    <!-- Full Calendar -->
    <script src="{{ asset('js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }

                    if (currentIndex === 3)
                    {
                        $('#lblProjectName').html($('#txtProjectName').val());
                        $('#lblIdNumber').html($('#txtIdNumber').val());
                        $('#lblBussinessName').html($('#txtBussinessName').val());
                        $('#lblAddress').html($('#txtAddress').val());
                        $('#lblPhone').html($('#txtPhone').val());
                        $('#lblCellphone').html($('#txtCellphone').val());
                        $('#lblEmail').html($('#txtEmail').val());
                        $('#lblContact').html($('#txtContact').val());
                        $('#lblPosition').html($('#txtPosition').val());
                        $('#lblCity').html($('#txtCity').val());
                        $('#lblDepartment').html($('#txtDepartment').val());
                        $('#lblQuota').html($('#txtQuota').val());

                        $('#tblFinalLocals tbody').html('');
                        $.each($('#tblLocals tbody tr'), function() {
                            var tr = '<tr>';
                            tr += '<td>' + $(this).children('td').text() + '</td>';
                            tr += '<td>' + $(this).children('td').next().text() + '</td>';
                            tr += '<td>' + $(this).children('td').next().next().text() + '</td>';
                            tr += '<td>' + $(this).children('td').next().next().next().text() + '</td>';
                            tr += '<td>' + $(this).children('td').next().next().next().next().text() + '</td>';
                            tr += '<td>' + $(this).children('td').next().next().next().next().next().text() + '</td>';
                            tr += '</tr>';
                            $('#tblFinalLocals tbody').append(tr);
                        });

                        $('#tblFinalServices tbody').html('');
                        $.each($('#tblServices tbody tr'), function() {
                            if ($(this).children('td').next().next().children().children('input').next().next().val() != '') {
                                var tr = '<tr>';
                                tr += '<td></td>';
                                tr += '<td>' + $(this).children('td').html() + '</td>';
                                tr += '<td>' + $(this).children('td').next().html() + '</td>';
                                tr += '<td>' + $(this).children('td').next().next().children().children('input').next().next().val() + '</td>';
                                tr += '</tr>';
                                $('#tblFinalServices tbody').append(tr);
                                $('#tblFinalServices tbody input').attr('disabled', true);
                            }
                        });

                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });


            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


            /* initialize the external events
             -----------------------------------------------------------------*/


            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [
                    {
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d-5),
                        end: new Date(y, m, d-2)
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d-3, 16, 0),
                        allDay: false
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d+4, 16, 0),
                        allDay: false
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d+1, 19, 0),
                        end: new Date(y, m, d+1, 22, 30),
                        allDay: false
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/'
                    }
                ]
            });


        });

        $(document).on('click', '#btnNewLocal', function () {
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
            $('#txtNewLocalName, #txtNewLocalCity, #txtNewLocalDepartment').val('');
        });

        function findClient(clientId) {
            $('#cmbIdType, #txtIdNumber, #txtBussinessName, #txtAddress, #txtPhone, #txtCellphone, #txtEmail, #txtContact, #txtPosition, #txtCity, #txtDepartment').val('');
            $(clients).each(function (client) {
                if (clients[client].id == clientId) {
                    $('#cmbIdType').val(clients[client].identification_type_id);
                    $('#txtIdNumber, #txtIdOP').val(clients[client].identification_number);
                    $('#txtBussinessName, #txtClientOP').val(clients[client].bussiness_name);
                    $('#txtAddress').val(clients[client].address);
                    $('#txtPhone').val(clients[client].phone);
                    $('#txtCellphone').val(clients[client].cellphone);
                    $('#txtEmail').val(clients[client].email);
                    $('#txtContact').val(clients[client].contact);
                    $('#txtPosition').val(clients[client].position);
                    $('#txtCity').val(clients[client].city);
                    $('#txtDepartment').val(clients[client].department);
                    $('.tblLocals tbody').html('');
                    $(clients[client].locales).each(function(j) {
                        var local = clients[client].locales[j];
                        var tr = '<tr>';
                        tr += '<td>';
                        tr += local.name;
                        tr += '<input type="hidden" name="txtLocalName[]" value="' + local.name + '">';
                        tr += '</td>';
                        tr += '<td>'
                        tr += local.city;
                        tr += '<input type="hidden" name="txtLocalCity[]" value="' + local.city + '">';
                        tr += '</td>';
                        tr += '<td>';
                        tr += local.department;
                        tr += '<input type="hidden" name="txtLocalDepartment[]" value="' + local.department + '">';
                        tr += '</td>';
                        tr += '</tr>';
                        $('.tblLocals tbody').append(tr);

                    });
                }
            });
        }

    </script>
@endsection