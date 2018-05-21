@extends('layouts.home')

@section('title', 'Inicio')

@section('content')


    <div class="clearfix">
    </div>
<!-- inicio modal editar cliente -->
<div class="center-block">
    <div class="clearfix">
    </div>
    <div class="fade modal " aria-hidden="true" data-width = "760" id="modalCliente" tabindex="-1">
        <div class="modal-dialog" id="mdialTamanio">
            <div class="modal-content">
                <div class="modal-headers">
                    <button aria-hidden="true" type="button" class="close" data-dismiss="modal"></button>
                    <h2 class="modal-title" >
                        <i class="glyphicon glyphicon-edit">
                        </i>
                        Edición Clientes
                    </h2>
                </div>


	            <div class="modal-body">
	                {!! Form::open(['route'=>array('update_master_client'),'method'=>'PUT','id'=>'form-editar-usuarios']) !!}
	                    <div class="container-fluid">
		                    <div class="row">
	                            <input type="hidden" id="id">
	                            <div class="col-md-12">
		                            {!!Form::label('email', 'E-Mail Address',['class' => 'awesome'])!!}
		                            {!!Form::textarea('ART_Descripcion')
                                        !!}
		                            <div class="col-md-6">
	                                    <label for="recipient-name" class="control-label">Tipo Identificacion:</label>
                                        <input type="text" class="form-control" id="identification_type_id">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">Número:</label>
                                        <input type="text" class="form-control" id="identification_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">Razón Social:</label>
                                        <input type="text" class="form-control" id="bussiness_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">Dirección:</label>
                                        <input type="text" class="form-control" id="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">Telefono:</label>
                                        <input type="text" class="form-control" id="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">Movil:</label>
                                        <input type="text" class="form-control" id="cellphone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">Correo:</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">Contacto:</label>
                                        <input type="text" class="form-control" id="contact">
                                    </div>
                                </div>
                            </div>
	                        <div class="row">
		                        <div class="col-md-12">
			                        <div class="col-md-6">
				                        <label for="recipient-name" class="control-label">Ciudad:</label>
				                        <input type="text" class="form-control" id="city">
			                        </div>
			                        <div class="col-md-6">
				                        <label for="recipient-name" class="control-label">Cupo:</label>
				                        <input type="text" class="form-control" id="quota">
			                        </div>
		                        </div>
	                        </div>
	                        <div class="row">
		                        <div class="col-md-12">
			                        <div class="col-md-6">
				                        <label for="recipient-name" class="control-label">Plazo:</label>
				                        <input type="text" class="form-control" id="payment_deadline">
			                        </div>

		                        </div>
	                        </div>
	                        <br><br>
	                        <div class="modal-footer">
		                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
		                        <button type="submit" class="btn btn-primary">Editar</button>
		                        <button type="button" class="btn btn-danger">Eliminar</button>
	                        </div>
                        </div>
	                {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


<!-- fin modal -->

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
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered" id = 'tblClients'>
				<br><br>
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
					<th>Acciones</th>
				</tr>
				</thead>
			</table>
		</div>

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
<!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
    var table =
    $('#tblClients').DataTable({
    language: {
    "decimal": "",
    "emptyTable": "No hay información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "Sin resultados encontrados",
    "paginate": {
    "first": "Primero",
    "last": "Ultimo",
    "next": "Siguiente",
    "previous": "Anterior"
    }
    },
    'proccesing':true, 
    'serverSide':true, 
    'ajax': "{{ route('listClients')}}", 
    'columns' : [ 
    {data: 'identification_type_id'}, 
    {data: 'identification_number'}, 
    {data: 'bussiness_name'}, 
    {data: 'address'}, 
    {data: 'phone'},
    {data: 'cellphone'},
    {data: 'email'},
    {data: 'email'},
    {data: 'city'},
    {data: 'quota'},
    {data: 'payment_deadline'},
    { 
        defaultContent: 
            '<div class="align-content-center"><a title="Editar Articulo" href="javascript:;" class="btn btn-warning edit"><i class="glyphicon glyphicon-pencil"></i></a>',
        data: 'action', 
        name: 'action', 
        title: 'Acciones', 
        orderable: false, 
        searchable: false, 
        exportable: false, 
        printable: false, 
        className: 'text-center', 
        render: null, 
        responsivePriority: 2 
    } 
    ] 
    });

    table.on('click', '.edit', function (e) {
        e.preventDefault();
        $tr = $(this).closest('tr');
        var dataTable = table.row($tr).data();
        console.log(dataTable);
        $('#id').val(dataTable.id);
        $('#identification_type_id').val(dataTable.identification_type_id);
        $('#identification_number').val(dataTable.identification_number);
        $('#bussiness_name').val(dataTable.bussiness_name);
        $('#address').val(dataTable.address);
        $('#phone').val(dataTable.phone);
        $('#cellphone').val(dataTable.cellphone);
        //$('#email').val(dataTable.email);
        $('#contact').val(dataTable.contact);
        $('#city').val(dataTable.city);
        $('#quota').val(dataTable.quota);
        $('#payment_deadline').val(dataTable.payment_deadline);
        console.log( $('#identification_number').val());
	    $('#modalCliente').modal('toggle');
    });

});

</script>
@endsection