@extends('layouts.master')
@section('plugins.Datatables', true)
@section('content')

    <!--Styles-->
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
<!--Title and breadcrum-->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-sm-6">
                <h2><i class="fas fa-fw fa-file-medical-alt" style="margin-right: 8px;"></i>Administrar Incapacidades
                </h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
                    <li class="breadcrumb-item">Incapacidades</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--/Title and breadcrum-->

<!--Buttons(add, search & filter)-->
<div class="container">
    <form action="{{ url('incapacidad.list') }}" method="GET" class="form-inline" style="overflow-x:auto;">
        <div class="col-sm-12">
            <div class="form-group row">
                <button type="button" id="btnAñadirIncap" name="btnAñadirIncap" class="btn btn-success btn-sm"
                    onclick="window.location = 'incapacidad/createIncap'"
                    style="margin-right: 14px; margin-left: 14px;"><i class="fas fa-plus"
                        style="margin-right: 5px;"></i>Añadir Nueva</button>
            </div>
        </div>
    </form>
    <!--/Buttons(add, search & filter)-->

    <!--Table-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive-sm" style="overflow-x:auto;">
                            <table style="width:100%" name="tablaIncap" id="tablaIncap"
                                class="table table-sm table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Número de documento</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de finalización</th>
                                        <th>EPS</th>
                                        <th>Tipo de incapacidad</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Table-->
</div>
@endsection

@section('js')
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaIncap').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.2/i18n/es_es.json"
            }
        });
    });
</script>
@endsection
