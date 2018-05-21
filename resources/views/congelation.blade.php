@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Congelación</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Congelación</strong>
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
                            <div class="form-group col-lg-5">
                                <label>Cliente</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Hacienda</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-2">
                                <label>Orden de Producción</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Fecha OPU</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Fecha Congelación</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Responsable</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Lote Medio T1, T2</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Ubicación</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Termo</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Canastilla</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Marca</label>
                                <input type="text" class="form-control input-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Planilla de Congelación</h5>
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
                                    <th>Sello</th>
                                    <th>Clasificación</th>
                                    <th>Donadora</th>
                                    <th>Raza</th>
                                    <th>Toro</th>
                                    <th>Raza</th>
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
                                </tr>
                                <tr class="gradeA">
                                    <td>5</td>
                                    <td>Trident</td>
                                    <td>Internet Explorer 7</td>
                                    <td>Win XP SP2+</td>
                                    <td class="center">7</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>6</td>
                                    <td>Trident</td>
                                    <td>AOL browser (AOL desktop)</td>
                                    <td>Win XP</td>
                                    <td class="center">6</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>7</td>
                                    <td>Gecko</td>
                                    <td>Firefox 1.0</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td class="center">1.7</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>8</td>
                                    <td>Gecko</td>
                                    <td>Firefox 1.5</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td class="center">1</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>9</td>
                                    <td>Gecko</td>
                                    <td>Firefox 2.0</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td class="center">8</td>
                                    <td class="center">4</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>10</td>
                                    <td>Gecko</td>
                                    <td>Firefox 3.0</td>
                                    <td>Win 2k+ / OSX.3+</td>
                                    <td class="center">4</td>
                                    <td class="center">9</td>
                                </tr>
                                <tr class="gradeA">
                                    <td>11</td>
                                    <td>Gecko</td>
                                    <td>Camino 1.0</td>
                                    <td>OSX.2+</td>
                                    <td class="center">8</td>
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