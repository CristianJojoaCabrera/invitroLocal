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
				            {!!  Form::text('id',null,
                                    ['class'=>'form-control','required','style'=>"display:none" ]);
                            !!}
				            <div class="col-md-12">
					            <div class="col-md-3">
						            {!!
									   Form::label('tipo', 'Tipo Identificación :',['class' => 'awesome'])
								   !!}
						            {!! Form::select(
						                'identification_type_id',
						                [1 => 'Cédula de Ciudadanias', 2 => 'Nit',3 =>'Cédula de Extranjería'],null,
						                ['class'=>'form-control input-sm']
						                )
						            !!}
					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('numero', 'Número :',['class' => 'awesome'])
								   !!}
						            {!!
										Form::text('identification_number',null,
											['class'=>'form-control','required','maxlength' => 10 , 'minlength' =>3]
										)
									!!}
					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('razonSo', 'Razón Social :',
									    ['class' => 'awesome']
									   )
								   !!}
						            {!!
										Form::text('bussiness_name',null,
											['class'=>'form-control','required','maxlength' => 15 , 'minlength' =>3]
										)
									!!}
					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('direccion', 'Dirección :',['class' => 'awesome'])
								   !!}
						            {!!
										Form::text('address',null,
											['class'=>'form-control','required','maxlength' => 13 , 'minlength' =>3]
										)
									!!}

					            </div>
				            </div>
			            </div>
			            <div class="row">
				            <div class="col-md-12">
					            <div class="col-md-3">
						            {!!
									   Form::label('telefono', 'Telefono :',['class' => 'awesome'])
								    !!}
						            {!!
										Form::text('phone',null,
											['class'=>'form-control','required','maxlength' => 13 , 'minlength' =>3]
										)
									!!}
					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('movil', 'Movil :',['class' => 'awesome'])
								    !!}
						            {!!
										Form::text('cellphone',null,
										['class'=>'form-control','required','maxlength' => 13 , 'minlength' =>3]
										)
									!!}
					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('correo', 'Correo :',['class' => 'awesome'])
								    !!}
						            {!!  Form::email('Usua_Correo',null,
                                            ['class'=>'form-control','required']
                                         );
                                    !!}
					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('contacto', 'Contacto :',
									   ['class' => 'awesome',])

								    !!}
						            {!!
										Form::text('contact',null,
											['class'=>'form-control','required','maxlength' => 10 , 'minlength' =>3]
										)
									!!}
					            </div>
				            </div>
			            </div>
			            <div class="row">
				            <div class="col-md-12">
					            <div class="col-md-3">
						            {!!
									   Form::label('ciudad', 'Ciudad :',['class' => 'awesome'])
								    !!}
						            {!!
										Form::text('city',null,
											['class'=>'form-control','required','maxlength' => 10 , 'minlength' =>3]
										)
									!!}

					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('cupo', 'Cupo :',['class' => 'awesome'])
								    !!}
						            {!!
										Form::text('quota',null,
											['class'=>'form-control','required','maxlength' => 10 , 'minlength' =>3]
										)
									!!}
					            </div>
					            <div class="col-md-3">
						            {!!
									   Form::label('plazo', 'Plazo :',['class' => 'awesome'])
								    !!}
						            {!!
										Form::text('payment_deadline',null,
											['class'=>'form-control','required','maxlength' => 10 , 'minlength' =>3]
										)
									!!}
					            </div>
				            </div>
			            </div>
			            <br><br>
			            <div class="modal-footer">
				            <div class="row">
					            <div class="col-md-1">
						            <button type="button" class="btn btn-danger">Eliminar</button>
					            </div>
					            <div class="col-md-3 col-md-offset-8">
						            <button type="submit" class="btn btn-primary">Editar</button>
						            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					            </div>
				            </div>
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
	{!! Form::open(['route'=>array('create_master_client'),'method'=>'POST','id'=>'form-crear-usuarios']) !!}
		<div class="row">
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
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-2">
											{!! Form::select(
												'identification_type_id',
												[1 => 'Cédula de Ciudadania', 2 => 'Nit',3 =>'Cédula de Extranjería'],1,
												['class'=>'form-control input-sm']
												)
											!!}
										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtNumId',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder'=>'Número :','id'=>'txtNumId'
													]
												)
											!!}
										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtBussinessName',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 15 , 'minlength' =>3,
														'placeholder'=>'Razón Social :'
													]
												)
											!!}
										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtAddress',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 13 , 'minlength' =>3,
														'placeholder'=>'Dirección :'
													]
												)
											!!}
										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtPhone',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 13 , 'minlength' =>3,
														'placeholder'=>'Telefono :'
													]
												)
											!!}
										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtCellphone',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 13 , 'minlength' =>3,
														'placeholder'=>'Movil:'
													]
												)
											!!}
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-2">
											{!!  Form::email('txtEmail',null,
													[
														'class'=>'form-control','required',
														'placeholder'=>'Correo :'
													]
												 );
											!!}
										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtContact',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder'=>'Contacto :'
													]
												)
											!!}
										</div>
										<div class="col-md-2">

											{!!
												Form::text('txtPosition',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder'=>'Cargo :'
													]
												)
											!!}

										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtDepartment',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder'=>'Departamentos :'
													]
												)
											!!}

										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtCity',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder'=>'Ciudad :'
													]
												)
											!!}

										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtQuota',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder'=>'Cupo Disponible :'
													]
												)
											!!}
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-2">
											{!!
												Form::text('txtDeadlinePayment',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder' => 'Plazo de Pago :'
													]
												)
											!!}
										</div>
										<div class="col-md-2">
											{!!
												Form::text('txtSummary',null,
													[
														'class'=>'form-control','required',
														'maxlength' => 10 , 'minlength' =>3,
														'placeholder' => 'Inventario Semen :'
													]
												)
											!!}
										</div>
									</div>
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
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Nombre del local" id="txtNewLocalName">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Contacto" id="txtNewLocalContact">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Teléfono" id="txtNewLocalPhone">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Correo" id="txtNewLocalEmail">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Departamento" id="txtNewLocalDepartment">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Ciudad" id="txtNewLocalCity">
										</div>
									</div>
								</div>
								<br>
								<div class="col-md-12">
									<button type="button" class="btn btn-primary" id="btnNewLocal">Agregar</button>
									<br>
									<br>
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
	{!! Form::close() !!}
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
    {data: 'contact'},
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
        $('input[name=id]').val(dataTable.id);
        $('input[name=identification_type_id]').val(dataTable.identification_type_id);
        $('input[name=identification_number]').val(dataTable.identification_number);
        $('input[name=bussiness_name]').val(dataTable.bussiness_name);
        $('input[name=address]').val(dataTable.address);
        $('input[name=phone]').val(dataTable.phone);
        $('input[name=cellphone]').val(dataTable.cellphone);
        $('input[name=Usua_Correo]').val(dataTable.email);
        $('input[name=contact]').val(dataTable.contact);
        $('input[name=city]').val(dataTable.city);
        $('input[name=quota]').val(dataTable.quota);
        $('input[name=payment_deadline]').val(dataTable.payment_deadline);
        console.log( $('input[name=emailT]').val());
	    $('#modalCliente').modal('toggle');
    });

});

</script>
@endsection