@extends('layouts.master')
@section('plugins.Datatables', true)
@section('content')
    <!--Styles-->
    {{-- {{var_dump($contratos);}}
    {{ die() }} --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Script -->
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--Title and breadcrum-->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-sm-4">
                    <h4><i class="fas fa-fw fa-users" style="margin-right: 14px;"></i>
                        {{ ucwords(strtolower($persona->nombre)) }}</h4>
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/persona">Colaboradores</a></li>
                        <li class="breadcrumb-item">Actualizar Colaboradores</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--/Title and breadcrum-->

    <!--Menu-Navbar y Content Menu-forms-->
    <div class="container">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header">
                <ul class="nav nav-tabs" id="content" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="menu1-tab" data-toggle="pill" href="#menu1" role="tab">Datos
                            Personales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="menu2-tab" data-toggle="pill" href="#menu2" role="tab">Datos
                            Familiares</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="menu3-tab" data-toggle="pill" href="#menu3" role="tab">Información
                            Laboral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="menu4-tab" data-toggle="pill" href="#menu4" role="tab">Información
                            Financiera</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="menu5-tab" data-toggle="pill" href="#menu5" role="tab">Seguridad
                            Social</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="menu6-tab" data-toggle="pill" href="#menu6" role="tab">Archivos</a>
                    </li>
                </ul>
            </div>

            <!-----------------Content Menu-forms-------------------------->
            <div class="card-body">
                <div class="tab-content" id="menu-content">
                    <!------Content Menu1-forms-------->
                    <div class="tab-pane fade show active" id="menu1" role="tabpanel">
                        <form enctype="multipart/form-data" action="{{ route('persona.update', $id_persona) }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="container">
                                    <h5 class="my-2" style="font-size: medium; color: black;"><b>Información
                                            Personal</b></h5>
                                    <hr class="my-1" width="700" size="2px">
                                </div>
                                <div class="col-sm-1 mt-2 text-center"></div>
                                <div class="col-sm-3 mt-4 text-center">
                                    <img id="foto" src="{{ asset('../img') . '/' . $persona->foto }}"
                                        style="width: 80%;" />
                                    <input class="form-control mt-3" id="foto" name="foto" type="file" />
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="primer_apellido" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Primer Apellido</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="primer_apellido"
                                                    id="primer_apellido" value="{{ $persona->primer_apellido }}"
                                                    placeholder="Primer Apellido" />
                                            </div>
                                            <label for="segundo_apellido" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Segundo Apellido</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="segundo_apellido"
                                                    id="segundo_apellido" value="{{ $persona->segundo_apellido }}"
                                                    placeholder="Segundo Apellido" />
                                            </div>
                                            <label for="nombre" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombre</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="nombre" id="nombre"
                                                    value="{{ $persona->nombre }}" placeholder="Nombre" />
                                            </div>
                                            <label for="tipo_documento" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Tipo de documento</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="tipo_documento"
                                                    id="tipo_documento">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($tipos_doc as $tipo_doc)
                                                        @if ($tipo_doc->id_tipo_doc == $persona->tipo_documento)
                                                            <option value="{{ $tipo_doc['id_tipo_doc'] }}" selected>
                                                                {{ $tipo_doc['nombre_tipo_doc'] }}</option>
                                                        @else
                                                            <option value="{{ $tipo_doc['id_tipo_doc'] }}">
                                                                {{ $tipo_doc['nombre_tipo_doc'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="id_persona" class="col-sm-4 col-form-label" style="color: #4b545c;">
                                                Número de documento <i class="fas fa-info-circle" data-toggle="tooltip"
                                                    title="Únicamente números." class="tooltiptext"></i></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="id_persona"
                                                        id="id_persona" value="{{ $persona->id_persona }}" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-address-card text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 mt-2 text-center"></div>
                                <div class="col-sm-2 mt-2 text-center"></div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            @csrf
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;"><b>Datos
                                                        Básicos</b></h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="ciudad_exp" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Ciudad de expedición</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <select type="text" class="form-control" name="ciudad_exp"
                                                        id="ciudad_exp">
                                                        <option value="">--Seleccionar</option>
                                                        @foreach ($ciudades as $ciudad)
                                                            @if ($ciudad->id_ciudad == $persona->ciudad_exp)
                                                                <option value="{{ $ciudad['id_ciudad'] }}" selected>
                                                                    {{ $ciudad['nombre_ciudad'] }}</option>
                                                            @else
                                                                <option value="{{ $ciudad['id_ciudad'] }}">
                                                                    {{ $ciudad['nombre_ciudad'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <label for="sexo" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Sexo</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="" class="form-control" name="sexo" id="sexo">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($sexos as $sexo)
                                                        @if ($sexo->id_sexo == $persona->sexo)
                                                            <option value="{{ $sexo['id_sexo'] }}" selected>
                                                                {{ $sexo['nombre_sexo'] }}</option>
                                                        @else
                                                            <option value="{{ $sexo['id_sexo'] }}">
                                                                {{ $sexo['nombre_sexo'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="tipo_sangre" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Tipo de sangre</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="tipo_sangre"
                                                    id="tipo_sangre">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($tipos_sang as $tipo_sang)
                                                        @if ($tipo_sang->id_tipo_sang == $persona->tipo_sangre)
                                                            <option value="{{ $tipo_sang['id_tipo_sang'] }}" selected>
                                                                {{ $tipo_sang['nombre_tipo_sang'] }}</option>
                                                        @else
                                                            <option value=" {{ $tipo_sang['id_tipo_sang'] }}">
                                                                {{ $tipo_sang['nombre_tipo_sang'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="fecha_nacimiento" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Fecha de nacimiento</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="fecha_nacimiento"
                                                        id="fecha_nacimiento" value="{{ $persona->fecha_nacimiento }}" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="edad" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Edad</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="edad" id="edad"
                                                    value="{{ $persona->edad }}" />
                                            </div>
                                            <label for="educacion" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Educación</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="educacion" id="educacion">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($educaciones as $educacion)
                                                        @if ($educacion->id_educacion == $persona->educacion)
                                                            <option value="{{ $educacion['id_educacion'] }}" selected>
                                                                {{ $educacion['nombre_educac'] }}</option>
                                                        @else
                                                            <option value="{{ $educacion['id_educacion'] }}">
                                                                {{ $educacion['nombre_educac'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;"><b>Datos
                                                        Generales</b></h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="ciudad_resid" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Ciudad de residencia</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="ciudad_resid"
                                                    id="ciudad_resid">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($ciudades as $ciudad_res)
                                                        @if ($ciudad_res->id_ciudad == $persona->ciudad_resid)
                                                            <option value="{{ $ciudad_res['id_ciudad'] }}" selected>
                                                                {{ $ciudad_res['nombre_ciudad'] }}</option>
                                                        @else
                                                            <option value="{{ $ciudad_res['id_ciudad'] }}">
                                                                {{ $ciudad_res['nombre_ciudad'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="direccion" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Dirección</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="direccion" id="direccion"
                                                    value="{{ $persona->direccion }}" placeholder="" />
                                            </div>
                                            <label for="celular" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Celular</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="celular" id="celular"
                                                        value="{{ $persona->celular }}" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-mobile-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="email" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Correo electrónico</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="email" id="email"
                                                        value="{{ $persona->email }}" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-at text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;">
                                                    <b>Estado del Colaborador</b>
                                                </h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="estado_colab" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Estado</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="estado_colab"
                                                    id="estado_colab">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($estados as $estado)
                                                        @if ($estado->id_est_colab == $persona->estado_colab)
                                                            <option value="{{ $estado['id_est_colab'] }}" selected>
                                                                {{ $estado['nombre_est_colab'] }}</option>
                                                        @else
                                                            <option value="{{ $estado['id_est_colab'] }}">
                                                                {{ $estado['nombre_est_colab'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;">
                                                    <b>Contacto de Emergencia</b>
                                                </h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="nomapell_emrg" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombres y Apellidos</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="nomapell_emrg"
                                                    id="nomapell_emrg" placeholder=""
                                                    value="{{ $persona->nomapell_emrg }}" />
                                            </div>
                                            <label for="contacto_emrg" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Celular</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="contacto_emrg"
                                                        id="contacto_emrg" value="{{ $persona->contacto_emrg }}" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-mobile-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="btnGuardarM1"
                                            class="btn btn-success float-right">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-sm-2 mt-2 text-center"></div>
                    </div>
                    <!------/Content Menu1-forms------->
                    <!-------Content Menu2-forms------->
                    <div class="tab-pane fade" id="menu2" role="tabpanel">
                        <form enctype="multipart/form-data" action="{{ route('persona.update', $id_persona) }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <input type="text" class="form-control" name="id_persona" id="id_persona"
                                                value="{{ $persona->id_persona }}" style="display:none" />
                                            <input type="text" class="form-control" name="primer_apellido"
                                                id="primer_apellido" value="{{ $persona->primer_apellido }}"
                                                style="display:none" />
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;">
                                                    <b>Información del Familiar</b>
                                                </h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card mt-3">
                                                            <div class="card-body">
                                                                <div class="table-responsive-sm" style="overflow-x:auto;">
                                                                    <table id="tablaFamiliar" style="width:100%"
                                                                        class="table table-sm table-bordered table-hover">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Parentezco</th>
                                                                                <th>Apellidos</th>
                                                                                <th>Nombre</th>
                                                                                <th>Edad</th>
                                                                                <th>Sexo</th>
                                                                            </tr>
                                                                        </thead>
                                                                     
                                                            
                                                                        <tbody>
                                                                            @forelse ($familiares as $value)
                                                                            <tr>
                                                                            <td>{{ $value->id_familiar }}</td>
                                                                                <td>{{ $value->nombre_parentezco }}</td>
                                                                                <td>{{ $value->apellidos_fliar }}</td>
                                                                                <td>{{ $value->nombres_fliar }}</td>
                                                                                <td>{{ $value->edad_fliar }}</td>
                                                                                <td>{{ $value->sexo_fliar }}</td>
                                                                            </tr>
                                                                            @empty
                                                                                <p>No users</p>
                                                                            @endforelse

                                                                            <tr>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label for="parentezco" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Parentezco</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="parentezco"
                                                    id="parentezco">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($parentezcos as $parentezco)
                                                        @if ($parentezco->id_parentezco == $persona->parentezco)
                                                            <option value="{{ $parentezco['id_parentezco'] }}" selected>
                                                                {{ $parentezco['nombre_parentezco'] }}</option>
                                                        @else
                                                            <option value="{{ $parentezco['id_parentezco'] }}">
                                                                {{ $parentezco['nombre_parentezco'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="apellidos_fliar" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Apellidos</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="apellidos_fliar"
                                                    id="apellidos_fliar" placeholder=""
                                                    value="{{ $persona->apellidos_fliar }}" />
                                            </div>
                                            <label for="nombres_fliar" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombres</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="nombres_fliar"
                                                    id="nombres_fliar" placeholder=""
                                                    value="{{ $persona->nombres_fliar }}" />
                                            </div>
                                            <label for="fecha_nacimiento" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Fecha de nacimiento</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="fecha_nacimiento"
                                                        id="fecha_nacimiento" value="" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="edad" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Edad</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="edad" id="edad" value="" />
                                            </div>
                                            <label for="gen" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Sexo</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="" class="form-control" name="sexo" id="sexo">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($sexos as $sexo)
                                                        <option value="{{ $sexo['id_sexo'] }}">
                                                            {{ $sexo['nombre_sexo'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <button id="btnGuardarM2" type="submit"
                                            class="btn btn-success float-right">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-2"></div>
                    </div>
                    <!-------/Content Menu2-forms------>

                    <!-------Content Menu3-forms------->
                    <div class="tab-pane fade" id="menu3" role="tabpanel">
                        <form enctype="multipart/form-data" action="{{ route('persona.update', $id_persona) }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <input type="text" class="form-control" name="id_persona" id="id_persona"
                                                value="{{ $persona->id_persona }}" style="display:none" />
                                            <input type="text" class="form-control" name="primer_apellido"
                                                id="primer_apellido" value="{{ $persona->primer_apellido }}" style="" />
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;">
                                                    <b>Información del Contrato</b>
                                                </h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="tipo_contrato" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Tipo de
                                                Contrato</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="tipo_contrato"
                                                    id="tipo_contrato">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($tipos_contr as $tipo_contrato)
                                                            @if ($tipo_contrato->id_tipo_contrato == $contrato->tipo_contrato)
                                                                <option value="{{ $tipo_contrato['id_tipo_contrato'] }}"
                                                                    selected>
                                                                    {{ $tipo_contrato['nombre_tip_contrato'] }}</option>
                                                            @else
                                                                <option value="{{ $tipo_contrato['id_tipo_contrato'] }}">
                                                                    {{ $tipo_contrato['nombre_tip_contrato'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="salario" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Salario <i class="fas fa-info-circle"
                                                    data-toggle="tooltip" title="Únicamente números."
                                                    class="tooltiptext"></i></label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="salario" id="salario"
                                                    placeholder="" />
                                            </div>
                                            <label for="fecha_ingreso" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Fecha
                                                de ingreso</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="fecha_ingreso"
                                                        id="fecha_ingreso" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="fecha_vencimiento" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Vencimiento de Contrato</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="fecha_vencimiento"
                                                        id="fecha_vencimiento" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="antiguedad" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Antigüedad</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="antiguedad"
                                                    id="antiguedad" />
                                            </div>
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;">
                                                    <b>Infromación del Cargo</b>
                                                </h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="cargo" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Cargo</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="cargo" id="cargo">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($cargos as $cargo)
                                                            @if ($cargo->id_cargo == $contrato->cargo)
                                                                <option value="{{ $cargo['id_cargo'] }}" selected>
                                                                    {{ $cargo['nombre_cargo'] }}</option>
                                                            @else
                                                                <option value="{{ $cargo['id_cargo'] }}">
                                                                    {{ $cargo['nombre_cargo'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="area" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Área</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="area" id="area">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($areas as $area)
                                                            @if ($area->id_area == $contrato->area)
                                                                <option value="{{ $area['id_area'] }}" selected>
                                                                    {{ $area['nombre_area'] }}</option>
                                                            @else
                                                                <option value="{{ $area['id_area'] }}">
                                                                    {{ $area['nombre_area'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="gerencia" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Gerencia</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="gerencia" id="gerencia">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($gerencias as $gerencia)
                                                            @if ($gerencia->id_gerencia == $contrato->gerencia)
                                                                <option value="{{ $gerencia['id_gerencia'] }}" selected>
                                                                    {{ $gerencia['nombre_gerencia'] }}</option>
                                                            @else
                                                                <option value="{{ $gerencia['id_gerencia'] }}">
                                                                    {{ $gerencia['nombre_gerencia'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="sede" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Sede</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="sede" id="sede">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($sedes as $sede)
                                                            @if ($sede->id_sede == $contrato->sede)
                                                                <option value="{{ $sede['id_sede'] }}" selected>
                                                                    {{ $sede['nombre_sede'] }}</option>
                                                            @else
                                                                <option value="{{ $sede['id_sede'] }}">
                                                                    {{ $sede['nombre_sede'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;"><b>Más
                                                        Información</b></h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="unidad_negocio" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Unidad
                                                de Negocio</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="unidad_negocio"
                                                    id="unidad_negocio">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($uns_negoc as $un_negoc)
                                                            @if ($un_negoc->id_und_negocio == $contrato->unidad_negocio)
                                                                <option value="{{ $un_negoc['id_und_negocio'] }}"
                                                                    selected>
                                                                    {{ $un_negoc['nombre_und_negocio'] }}</option>
                                                            @else
                                                                <option value="{{ $un_negoc['id_und_negocio'] }}">
                                                                    {{ $un_negoc['nombre_und_negocio'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="estrategico" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Estratégico</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="estrategico"
                                                    id="estrategico">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($estrategicos as $estrategico)
                                                            @if ($estrategico->id_estrategico == $contrato->estrategico)
                                                                <option value="{{ $estrategico['id_estrategico'] }}"
                                                                    selected>
                                                                    {{ $estrategico['nombre_estrategico'] }}</option>
                                                            @else
                                                                <option value="{{ $estrategico['id_estrategico'] }}">
                                                                    {{ $estrategico['nombre_estrategico'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="centro_costo" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Centro
                                                de Costo</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="centro_costo"
                                                    id="centro_costo">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($cents_costo as $cent_costo)
                                                            @if ($cent_costo->id_centro_costo == $contrato->centro_costo)
                                                                <option value="{{ $cent_costo['id_centro_costo'] }}"
                                                                    selected>
                                                                    {{ $cent_costo['nombre_centcosto'] }}</option>
                                                            @else
                                                                <option value="{{ $cent_costo['id_centro_costo'] }}">
                                                                    {{ $cent_costo['nombre_centcosto'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="tipo_dotacion" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Tipo de
                                                Dotación</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="tipo_dotacion"
                                                    id="tipo_dotacion">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ((array) $contratos as $contrato)
                                                        @foreach ($tipos_dot as $tipo_dot)
                                                            @if ($tipo_dot->id_tipo_dotac == $contrato->tipo_dotacion)
                                                                <option value="{{ $tipo_dot['id_tipo_dotac'] }}"
                                                                    selected>
                                                                    {{ $tipo_dot['nombre_tipo_dotac'] }}</option>
                                                            @else
                                                                <option value="{{ $tipo_dot['id_tipo_dotac'] }}">
                                                                    {{ $tipo_dot['nombre_tipo_dotac'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2"></div>
                    </div>
                    <!------/Content Menu3-forms------>

                    <!-------Content Menu4-forms------->
                    <div class="tab-pane fade" id="menu4" role="tabpanel">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="banco" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">Banco</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="banco" id="banco">
                                                <option value="">--Seleccionar</option>
                                                @foreach ((array) $contratos as $contrato)
                                                    @foreach ($bancos as $banco)
                                                        @if ($banco->id_banco == $contrato->banco)
                                                            <option value="{{ $banco['id_banco'] }}" selected>
                                                                {{ $banco['nombre_banco'] }}</option>
                                                        @else
                                                            <option value="{{ $banco['id_banco'] }}">
                                                                {{ $banco['nombre_banco'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="num_cuenta" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">Número
                                            de Cuenta <i class="fas fa-info-circle" data-toggle="tooltip"
                                                title="Únicamente números." class="tooltiptext"></i></label>
                                        <div class="col-sm-8 pb-3">
                                            <div class="input-group">
                                                @foreach ((array) $contratos as $contrato)
                                                    <input type="text" class="form-control" name="num_cuenta"
                                                        id="num_cuenta" value="{{ $contrato->num_cuenta }}" />
                                                @endforeach
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-credit-card text-lightblue"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <!------/Content Menu4-forms------->

                    <!-------Content Menu5-forms------->
                    <div class="tab-pane fade show" id="menu5" role="tabpanel">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="eps" class="col-sm-4 col-form-label pb-3" style="color: #4b545c;">EPS
                                            Aportes en Línea</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="eps" id="eps">
                                                <option value="">--Seleccionar</option>
                                                @foreach ((array) $contratos as $contrato)
                                                    @foreach ($epss as $eps)
                                                        @if ($eps->id_eps == $contrato->eps)
                                                            <option value="{{ $eps['id_eps'] }}" selected>
                                                                {{ $eps['nombre_eps'] }}</option>
                                                        @else
                                                            <option value="{{ $eps['id_eps'] }}">
                                                                {{ $eps['nombre_eps'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="afp" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">AFP</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="afp" id="afp">
                                                <option value="">--Seleccionar</option>
                                                @foreach ((array) $contratos as $contrato)
                                                    @foreach ($afps as $afp)
                                                        @if ($afp->id_afp == $contrato->afp)
                                                            <option value="{{ $afp['id_afp'] }}" selected>
                                                                {{ $afp['nombre_afp'] }}</option>
                                                        @else
                                                            <option value="{{ $afp['id_afp'] }}">
                                                                {{ $afp['nombre_afp'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="fondo_cesantias" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">Fondo
                                            de Cesantías</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="fondo_cesantias"
                                                id="fondo_cesantias">
                                                <option value="">--Seleccionar</option>
                                                @foreach ((array) $contratos as $contrato)
                                                    @foreach ($fondos_ces as $fondo_ces)
                                                        @if ($fondo_ces->id_fondo_cesantias == $contrato->fondo_cesantias)
                                                            <option value="{{ $fondo_ces['id_fondo_cesantias'] }}"
                                                                selected>
                                                                {{ $fondo_ces['nombre_fondo_ces'] }}</option>
                                                        @else
                                                            <option value="{{ $fondo_ces['id_fondo_cesantias'] }}">
                                                                {{ $fondo_ces['nombre_fondo_ces'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="riesgo" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">Riesgo</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="riesgo" id="riesgo">
                                                <option value="">--Seleccionar</option>
                                                @foreach ((array) $contratos as $contrato)
                                                    @foreach ($riesgos as $riesgo)
                                                        @if ($riesgo->id_riesgo == $contrato->riesgo)
                                                            <option value="{{ $riesgo['id_riesgo'] }}" selected>
                                                                {{ $riesgo['nombre_riesgo'] }}</option>
                                                        @else
                                                            <option value="{{ $riesgo['id_riesgo'] }}">
                                                                {{ $riesgo['nombre_riesgo'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="caja_compensac" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">Caja
                                            de Compensación</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="caja_compensac"
                                                id="caja_compensac">
                                                <option value="">--Seleccionar</option>
                                                @foreach ((array) $contratos as $contrato)
                                                    @foreach ($cajas_compen as $caja_compen)
                                                        @if ($caja_compen->id_caja_compensac == $contrato->caja_compensac)
                                                            <option value="{{ $caja_compen['id_caja_compensac'] }}"
                                                                selected>
                                                                {{ $caja_compen['nombre_caja_compensac'] }}</option>
                                                        @else
                                                            <option value="{{ $caja_compen['id_caja_compensac'] }}">
                                                                {{ $caja_compen['nombre_caja_compensac'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button id="btnGuardarM5" type="submit"
                                        class="btn btn-success float-right">Actualizar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="col-2"></div>
                    </div>
                    <!-------/Content Menu5-forms------->

                    <!-------Content Menu6-forms------->
                    <div class="tab-pane fade show" id="menu6" role="tabpanel">
                        <section class="d-flex text-center">
                            <div class="container d-flex justify-content-center">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-10 my-8">
                                        <label for="archivo" style="color: #4b545c;">Espacio exclusivo para ingresar
                                            archivos
                                            y/o documentación requerida del colaborador. <br><b>Únicamente en formato
                                                PDF.</b></label>
                                        <form action="../../form-result.php" method="post" enctype="multipart/form-data"
                                            target="_blank">
                                            <input type="file" name="archivo" id="archivo">
                                            <button id="btnGuardarM6" type="submit"
                                                class="btn btn-success btn-sm float-center">Cargar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                    <!-------/Content Menu6-forms------>
                </div>
            </div>
        </div>
    </div>
    <!--Menu-Navbar y Content Menu-forms-->
@endsection

@section('js')
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
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection

<!--Scripts-->
<script type="text/javascript" src="{{ asset('js/app.js') }}">

</script>
