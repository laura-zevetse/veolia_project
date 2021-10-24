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
            <div class="col-sm-4">
                <h4><i class="fas fa-fw fa-users" style="margin-right: 14px;"></i>Administrar Colaborador</h4>
            </div>
            <div class="col-sm-8">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item">Colaboradores</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--/Title and breadcrum-->

<!--Buttons(add, search & filter)-->
<div class="container">
    <form action="{{ url('persona.list') }}" method="GET" class="form-inline" style="overflow-x:auto;">
        <div class="col-sm-6">
            <div class="form-group row">
                <button type="button" id="btnAñadirCol" name="btnAñadirColab" class="btn btn-success btn-sm"
                    onclick="window.location = 'persona/createPerson'" style="margin-right: 14px; margin-left: 14px;"><i
                        class="fas fa-plus" style="margin-right: 5px;"></i>Añadir Nuevo</button>
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
                            <table style="width:100%" name="tablaColab" id="tablaColab"
                                class="table table-sm table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>N° de documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Celular</th>
                                        <th>E-mail</th>
                                        <th>Acciones</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $persona->id_persona }}</td>
                                            <td>{{ $persona->nombre }}</td>
                                            <td>{{ $persona->primer_apellido }}</td>
                                            <td>{{ $persona->celular }}</td>
                                            <td>{{ $persona->email }}</td>
                                            <td>
                                                <a href="{{ route('persona.edit', $persona->id_persona) }}">Editar</a>
                                            </td>
                                            <td>
                                                @if ($persona->estado_colab == 1)
                                                    Activo
                                                @else
                                                    Inactivo
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
    <!--/Table-->
</div>
@endsection
<!--Jquery-->
@section('js')
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaColab').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.2/i18n/es_es.json"
            }
        });
    });
</script>
@endsection
