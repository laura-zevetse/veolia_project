@extends('layouts.master')
@section('content')
<!--Styles CSS-->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2.css') }}">
<!-- Script -->
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    <!--Title and breadcrum-->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-sm-4">
                    <h4><i class="fas fa-fw fa-file-medical-alt" style="margin-right: 14px;"></i>Añadir Incapacidades
                    </h4>
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/incapacidad">Incapacidades</a></li>
                        <li class="breadcrumb-item">Añadir Incapacidad</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--/Title and breadcrum-->

    <!--Menu-form-->
    <div class="container">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-md-8">
                    <form enctype="multipart/form-data" method="POST" id="formularioIncapacidad">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="tipcon" class="col-sm-4 col-form-label pb-3"
                                    style="color:#4b545c">Colaborador</label>
                                <div class="col-sm-8 pb-3">
                                    <select type="text" class="form-control" name="id_contrato" id="id_contrato">
                                        <option value="">--Seleccionar</option>
                                        @foreach ($datos as $dato)
                                            <option value="{{ $dato->id_contrato }}">
                                                {{ $dato->nombre }} {{ $dato->primer_apellido }}
                                                {{ $dato->segundo_apellido }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <label for="id_tipo_incapacidad" class="col-sm-4 col-form-label pb-3"
                                    style="color:#4b545c">Tipo de
                                    incapacidad</label>
                                <div class="col-sm-8 pb-3">
                                    <select type="text" class="form-control" name="id_tipo_incapacidad"
                                        id="id_tipo_incapacidad">
                                        <option value="">--Seleccionar</option>
                                        @foreach ($tipoIncapacidad as $tiposIncapacidad)
                                            <option value="{{ $tiposIncapacidad['id_tipo_incapacidad'] }}">
                                                {{ $tiposIncapacidad['nombre_tipo_incapac'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tipo_incapacidad')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <label for="eps" class="col-sm-4 col-form-label pb-3" style="color:#4b545c">EPS
                                    Aportes en Línea</label>
                                <div class="col-sm-8 pb-3">
                                    <select type="text" class="form-control" name="eps" id="eps">
                                        <option value="">--Seleccionar</option>
                                        @foreach ($epss as $eps)
                                            <option value="{{ $eps['id_eps'] }}">
                                                {{ $eps['nombre_eps'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_eps')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <label for="fecha_inicio" class="col-sm-4 col-form-label pb-3" style="color:#4b545c">Fecha
                                    de
                                    inicio</label>
                                <div class="col-sm-8 pb-3">
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class="far fa-calendar-alt text-lightblue"></i></span>
                                        </div>
                                    </div>
                                    @error('fecha_inicio')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <label for="fecha_final" class="col-sm-4 col-form-label pb-3" style="color:#4b545c">Fecha de
                                    finalización</label>
                                <div class="col-sm-8 pb-3">
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="fecha_final" name="fecha_final">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class="far fa-calendar-alt text-lightblue"></i></span>
                                        </div>
                                        @error('fecha_final')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <label for="soporte" class="col-sm-4 col-form-label pb-3"
                                    style="color:#4b545c">Soporte</label>
                                <div class="col-sm-8 pb-3">
                                    <input type="file" name="soporte" id="soporte">
                                    @error('soporte')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <label for="observaciones" class="col-sm-4 col-form-label pb-3"
                                    style="color:#4b545c">Observaciones</label>
                                <div class="col-sm-8 pb-3">
                                    <textarea id="observaciones" name="observaciones" class="form-control"
                                        rows="4"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" id="btnIncapacidad">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
    <!--/Menu-form-->

@endsection
<!--Scripts-->
@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/incapacidadesDatos.js') }}"></script>
@endsection
