@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Inventario Semen</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Inventario Semen</strong>
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
                        <h5>Inventario</h5>
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
                                    <th>No</th>
                                    <th>Ubicación</th>
                                    <th>Fedcha Ingreso</th>
                                    <th>Lote</th>
                                    <th>Toro</th>
                                    <th>Raza</th>
                                    <th>Registro</th>
                                    <th>Central</th>
                                    <th>Convencional</th>
                                    <th>Sexado</th>
                                    <th>Carne</th>
                                    <th>Leche</th>
                                    <th>Fecha Salida</th>
                                    <th>Uso</th>
                                    <th>Total</th>
                                    <th></th>
                                    <th>Media</th>
                                    <th>1 de 4</th>
                                    <th>3 de 4</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX">
                                    <td>1</td>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeC">
                                    <td>2</td>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td class="center">5</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>3</td>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.5
                                    </td>
                                    <td>Win 95+</td>
                                    <td class="center">5</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>4</td>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 6
                                    </td>
                                    <td>Win 98+</td>
                                    <td class="center">6</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>5</td>
                                    <td>Trident</td>
                                    <td>Internet Explorer 7</td>
                                    <td>Win XP SP2+</td>
                                    <td class="center">7</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>6</td>
                                    <td>Trident</td>
                                    <td>AOL browser (AOL desktop)</td>
                                    <td>Win XP</td>
                                    <td class="center">6</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>7</td>
                                    <td>Gecko</td>
                                    <td>Firefox 1.0</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td class="center">1.7</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>8</td>
                                    <td>Gecko</td>
                                    <td>Firefox 1.5</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td class="center">1</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>9</td>
                                    <td>Gecko</td>
                                    <td>Firefox 2.0</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td class="center">8</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>10</td>
                                    <td>Gecko</td>
                                    <td>Firefox 3.0</td>
                                    <td>Win 2k+ / OSX.3+</td>
                                    <td class="center">4</td>
                                    <td class="center">9</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>11</td>
                                    <td>Gecko</td>
                                    <td>Camino 1.0</td>
                                    <td>OSX.2+</td>
                                    <td class="center">8</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                    <td class="center">4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection