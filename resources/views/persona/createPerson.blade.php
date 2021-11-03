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
                    <h4><i class="fas fa-fw fa-users" style="margin-right: 14px;"></i>Añadir Colaborador</h4>
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/persona">Colaboradores</a></li>
                        <li class="breadcrumb-item">Añadir Colaboradores</li>
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
                        <div id="errFormPersona" class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <form id="firstForm"  enctype="multipart/form-data" action="{{ route('persona.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="fechaActual" value="{{$fechaActual}}">
                            <input type="hidden" id="nameColaborate" value="">
                            <input type="hidden" id="idColaborate" value="">
                            <div class="row">
                                <div class="container">
                                    <h5 class="my-2" style="font-size: medium; color: black;"><b>Información
                                            Personal</b></h5>
                                    <hr class="my-1" width="700" size="2px">
                                </div>
                                
                                <div class="col-sm-1 mt-2 text-center"></div>
                                <div class="col-sm-3 mt-4 text-center">
                                    <img id="foto_img" src="../img/foto.png" style="width: 80%;" />
                                    <input class="form-control mt-3" id="foto" name="foto" type="file"
                                        placeholder="Elija la foto del colaborador" accept="image/*" />
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="primer_apellido" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Primer Apellido</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="primer_apellido"
                                                    id="primer_apellido" value="{{ old('primer_apellido') }}"
                                                    onkeyup="this.value=this.value.toUpperCase()" />
                                            </div>
                                            <label for="segundo_apellido" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Segundo Apellido</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="segundo_apellido"
                                                    id="segundo_apellido" placeholder=""
                                                    onkeyup="this.value=this.value.toUpperCase()" />
                                            </div>
                                            <label for="nombre" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombre</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="nombre" id="nombre"
                                                    placeholder="" onkeyup="this.value=this.value.toUpperCase()"
                                                    value="{{ old('nombre') }}" />
                                            </div>
                                            <label for="tipo_documento" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Tipo de documento</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="tipo_documento"
                                                    id="tipo_documento">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($tipos_doc as $tipo_doc)
                                                        @if ($tipo_doc['id_tipo_doc'] == old('tipo_documento'))
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
                                                Número de documento
                                                <i class="fas fa-info-circle" data-toggle="tooltip"
                                                    title="Únicamente números." class="tooltiptext"></i></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="id_persona"
                                                        id="id_persona" />
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
                                            <br><br><br>
                                            <label for="ciudad_exp" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Ciudad de expedición</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="ciudad_exp"
                                                    id="ciudad_exp">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($ciudades as $ciudad)
                                                        @if ($ciudad['id_ciudad'] == old('ciudad_exp'))
                                                            <option value="{{ $ciudad['id_ciudad'] }}" selected>
                                                                {{ $ciudad['nombre_ciudad'] }}</option>
                                                        @else
                                                            <option value="{{ $ciudad['id_ciudad'] }}">
                                                                {{ $ciudad['nombre_ciudad'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('ciudad_exp')
                                                    <small class="text-danger">*{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <label for="" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Sexo</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="sexo" class="form-control" name="sexo" id="sexo">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($sexos as $sexo)
                                                        @if ($sexo['id_sexo'] == old('sexo'))
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
                                                        @if ($tipo_sang['id_tipo_sang'] == old('tipo_sangre'))
                                                            <option value="{{ $tipo_sang['id_tipo_sang'] }}" selected>
                                                                {{ $tipo_sang['nombre_tipo_sang'] }}</option>
                                                        @else
                                                            <option value="{{ $tipo_sang['id_tipo_sang'] }}">
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
                                                        id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" onchange="calcularEdad();" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                                @error('fecha_nacimiento')
                                                    <small class="text-danger">*{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <label for="edad" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Edad</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="edad" id="edad" readonly=""
                                                    value="" />
                                            </div>
                                            <label for="educacion" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Educación</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="educacion" id="educacion">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($educaciones as $educacion)
                                                        @if ($educacion['id_educacion'] == old('educacion'))
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
                                            <br><br><br>
                                            <label for="ciudad_resid" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Ciudad de residencia</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="ciudad_resid"
                                                    id="ciudad_resid">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($ciudades as $ciudad_res)
                                                        @if ($ciudad_res['id_ciudad' == old('ciudad_resid')])
                                                            <option value="{{ $ciudad_res['id_ciudad'] }}" selected>
                                                                {{ $ciudad_res['nombre_ciudad'] }}</option>
                                                        @else
                                                            <option value="{{ $ciudad_res['id_ciudad'] }}">
                                                                {{ $ciudad_res['nombre_ciudad'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br><br><br>
                                            <label for="direccion" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Dirección</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="direccion" id="direccion"
                                                    placeholder="" />
                                            </div>
                                            <label for="celular" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Celular</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="celular"
                                                        id="celular" />
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
                                                    <input type="text" class="form-control" name="email" id="email" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-at text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                                @error('email')
                                                    <small class="text-danger">*{{ $message }}</small>
                                                @enderror
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
                                                        @if ($estado['id_est_colab'] == old('estado_colab'))
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
                                            <br><br><br>
                                            <label for="nomapell_emrg" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombres y Apellidos</label>
                                            <div class="col-sm-8 pb-3">
                                                <input type="text" class="form-control" name="nomapell_emrg"
                                                    id="nomapell_emrg" placeholder=""
                                                    onkeyup="this.value=this.value.toUpperCase()" />
                                            </div>
                                            <label for="contacto_emrg" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Celular</label>
                                            <div class="col-sm-8 pb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="contacto_emrg"
                                                        id="contacto_emrg" />
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-mobile-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="btnGuardarM1"
                                            class="btn btn-success float-right">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-sm-2 mt-2 text-center"></div>
                    </div>
                    <!------/Content Menu1-forms------->

                    <!-------Content Menu2-forms------->
                    <div class="tab-pane fade" id="menu2" role="tabpanel">

                        <form id="secondForm" enctype="multipart/form-data" action="{{ route('persona.familiar') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="id_persona_two" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombre Colaborador</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="id_persona"
                                                    id="id_persona_two">
                                                </select>
                                            </div>
                                            <div class="container">
                                                <h5 class="my-2" style="font-size: medium; color: black;">
                                                    <b>Información del Familiar</b>
                                                </h5>
                                                <hr class="my-1" width="650" size="2px">
                                            </div>
                                            <label for="parentezco" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Parentezco</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="parentezco"
                                                    id="parentezco">
                                                    <option value="0">--Seleccionar</option>
                                                    @foreach ($parentezcos as $parentezco)
                                                        @if ($parentezco['id_parentezco'] == old('parentezco'))
                                                            <option value="{{ $parentezco['id_parentezco'] }}" selected>
                                                                {{ $parentezco['nombre_parentezco'] }}</option>
                                                        @else
                                                            <option value="{{ $parentezco['id_parentezco'] }}">
                                                                {{ $parentezco['nombre_parentezco'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="apellidos_fliar" class="col-sm-4 col-form-label pb-3 familia"
                                                style="color: #4b545c;">Apellidos</label>
                                            <div class="col-sm-8 pb-3 familia">
                                                <input type="text" class="form-control" name="apellidos_fliar"
                                                    id="apellidos_fliar" placeholder=""
                                                    onkeyup="this.value=this.value.toUpperCase()" />
                                            </div>
                                            <label for="nombres_fliar" class="col-sm-4 col-form-label pb-3 familia"
                                                style="color: #4b545c;">Nombres</label>
                                            <div class="col-sm-8 pb-3 familia">
                                                <input type="text" class="form-control" name="nombres_fliar"
                                                    id="nombres_fliar" placeholder=""
                                                    onkeyup="this.value=this.value.toUpperCase()" />
                                            </div>
                                            <label for="fecha_nacimiento" class="col-sm-4 col-form-label pb-3 familia"
                                                style="color: #4b545c;">Fecha de nacimiento</label>
                                            <div class="col-sm-8 pb-3 familia">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="fecha_nac_fliar"
                                                        id="fecha_nac_fliar" onchange="calcularEdadFamiliar();"/>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt text-lightblue"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="edad" class="col-sm-4 col-form-label pb-3 familia"
                                                style="color: #4b545c;">Edad</label>
                                            <div class="col-sm-8 pb-3 familia">
                                                <input type="text" class="form-control" name="edad_fliar"
                                                    id="edad_fliar" />
                                            </div>
                                            <label for="gen" class="col-sm-4 col-form-label pb-3 familia"
                                                style="color: #4b545c;">Sexo</label>
                                            <div class="col-sm-8 pb-3 familia">
                                                <select type="" class="form-control" name="sexo_fliar" id="sexo_fliar">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($sexos as $sexo)
                                                        <option value="{{ $sexo['id_sexo'] }}">
                                                            {{ $sexo['nombre_sexo'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button id="btnGuardarM2" type="submit"
                                            class="btn btn-success float-right familia">Continuar >></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-2"></div>
                    </div>
                    <!-------/Content Menu2-forms------>

                    <!-------Content Menu3-forms------->
                    <div class="tab-pane fade" id="menu3" role="tabpanel">
                        <div id="errFormContrato" class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <form enctype="multipart/form-data" action="{{ route('persona.contrato') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="id_persona" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombre Colaborador</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="id_persona"
                                                    id="id_person_three">
                                                </select>
                                            </div>
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
                                                <select type="text" class="form-control tab3" name="tipo_contrato"
                                                    id="tipo_contrato">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($tipos_contr as $tipo_contrato)
                                                        @if ($tipo_contrato['id_tipo_contrato'] == old('tipo_contrato'))
                                                            <option value="{{ $tipo_contrato['id_tipo_contrato'] }}"
                                                                selected>
                                                                {{ $tipo_contrato['nombre_tip_contrato'] }}</option>
                                                        @else
                                                            <option value="{{ $tipo_contrato['id_tipo_contrato'] }}">
                                                                {{ $tipo_contrato['nombre_tip_contrato'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('tipo_contrato')
                                                    <small class="text-danger">*{{ $message }}</small>
                                                @enderror
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
                                                <select type="text" class="form-control tab3" name="cargo" id="cargo">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($cargos as $cargo)
                                                        @if ($cargo['id_cargo'] == old('cargo'))
                                                            <option value="{{ $cargo['id_cargo'] }}" selected>
                                                                {{ $cargo['nombre_cargo'] }}</option>
                                                        @else
                                                            <option value="{{ $cargo['id_cargo'] }}">
                                                                {{ $cargo['nombre_cargo'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="area" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Área</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control tab3" name="area" id="area">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($areas as $area)
                                                        @if ($area['id_area'] == old('area'))
                                                            <option value="{{ $area['id_area'] }}" selected>
                                                                {{ $area['nombre_area'] }}</option>
                                                        @else
                                                            <option value="{{ $area['id_area'] }}">
                                                                {{ $area['nombre_area'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="gerencia" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Gerencia</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control tab3" name="gerencia" id="gerencia">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($gerencias as $gerencia)
                                                        @if ($gerencia['id_gerencia'] == old('gerencia'))
                                                            <option value="{{ $gerencia['id_gerencia'] }}" selected>
                                                                {{ $gerencia['nombre_gerencia'] }}</option>
                                                        @else
                                                            <option value="{{ $gerencia['id_gerencia'] }}">
                                                                {{ $gerencia['nombre_gerencia'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="sede" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Sede</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control tab3" name="sede" id="sede">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($sedes as $sede)
                                                        @if ($sede['id_sede'] == old('sede'))
                                                            <option value="{{ $sede['id_sede'] }}" selected>
                                                                {{ $sede['nombre_sede'] }}</option>
                                                        @else
                                                            <option value="{{ $sede['id_sede'] }}">
                                                                {{ $sede['nombre_sede'] }}</option>
                                                        @endif
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
                                                <select type="text" class="form-control tab3" name="unidad_negocio"
                                                    id="unidad_negocio">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($uns_negoc as $un_negoc)
                                                        @if ($un_negoc['id_und_negocio'] == old('unidad_negocio'))
                                                            <option value="{{ $un_negoc['id_und_negocio'] }}" selected>
                                                                {{ $un_negoc['nombre_und_negocio'] }}</option>
                                                        @else
                                                            <option value="{{ $un_negoc['id_und_negocio'] }}">
                                                                {{ $un_negoc['nombre_und_negocio'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="estrategico" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Estratégico</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control tab3" name="estrategico"
                                                    id="estrategico">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($estrategicos as $estrategico)
                                                        @if ($estrategico['id_estrategico'] == old('estrategico'))
                                                            <option value="{{ $estrategico['id_estrategico'] }}"
                                                                selected>
                                                                {{ $estrategico['nombre_estrategico'] }}</option>
                                                        @else
                                                            <option value="{{ $estrategico['id_estrategico'] }}">
                                                                {{ $estrategico['nombre_estrategico'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="centro_costo" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Centro
                                                de Costo</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control tab3" name="centro_costo"
                                                    id="centro_costo">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($cents_costo as $cent_costo)
                                                        @if ($cent_costo['id_centro_costo'] == old('centro_costo'))
                                                            <option value="{{ $cent_costo['id_centro_costo'] }}"
                                                                selected>
                                                                {{ $cent_costo['nombre_centcosto'] }}</option>
                                                        @else
                                                            <option value="{{ $cent_costo['id_centro_costo'] }}">
                                                                {{ $cent_costo['nombre_centcosto'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="tipo_dotacion" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Tipo de
                                                Dotación</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control tab3" name="tipo_dotacion"
                                                    id="tipo_dotacion">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($tipos_dot as $tipo_dot)
                                                        @if ($tipo_dot['id_tipo_dotac'] == old('tipo_dotacion'))
                                                            <option value="{{ $tipo_dot['id_tipo_dotac'] }}" selected>
                                                                {{ $tipo_dot['nombre_tipo_dotac'] }}</option>
                                                        @else
                                                            <option value="{{ $tipo_dot['id_tipo_dotac'] }}">
                                                                {{ $tipo_dot['nombre_tipo_dotac'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <button id="btnGuardarM3" type="submit"
                                            class="btn btn-success float-right">Continuar >></button>
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
                                                @foreach ($bancos as $banco)
                                                    @if ($banco['id_banco'] == old('banco'))
                                                        <option value="{{ $banco['id_banco'] }}" selected>
                                                            {{ $banco['nombre_banco'] }}</option>
                                                    @else
                                                        <option value="{{ $banco['id_banco'] }}">
                                                            {{ $banco['nombre_banco'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="num_cuenta" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">Número
                                            de Cuenta <i class="fas fa-info-circle" data-toggle="tooltip"
                                                title="Únicamente números." class="tooltiptext"></i></label>
                                        <div class="col-sm-8 pb-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="num_cuenta"
                                                    id="num_cuenta" />
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
                                                @foreach ($epss as $eps)
                                                    @if ($eps['id_eps'] == old('eps'))
                                                        <option value="{{ $eps['id_eps'] }}" selected>
                                                            {{ $eps['nombre_eps'] }}</option>
                                                    @else
                                                        <option value="{{ $eps['id_eps'] }}">
                                                            {{ $eps['nombre_eps'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="afp" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">AFP</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="afp" id="afp">
                                                <option value="">--Seleccionar</option>
                                                @foreach ($afps as $afp)
                                                    @if ($afp['id_afp'] == old('afp'))
                                                        <option value="{{ $afp['id_afp'] }}" selected>
                                                            {{ $afp['nombre_afp'] }}</option>
                                                    @else
                                                        <option value="{{ $afp['id_afp'] }}">
                                                            {{ $afp['nombre_afp'] }}</option>
                                                    @endif
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
                                                @foreach ($fondos_ces as $fondo_ces)
                                                    @if ($fondo_ces['id_fondo_cesantias'] == old('fondo_cesantias'))
                                                        <option value="{{ $fondo_ces['id_fondo_cesantias'] }}" selected>
                                                            {{ $fondo_ces['nombre_fondo_ces'] }}</option>
                                                    @else
                                                        <option value="{{ $fondo_ces['id_fondo_cesantias'] }}">
                                                            {{ $fondo_ces['nombre_fondo_ces'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="riesgo" class="col-sm-4 col-form-label pb-3"
                                            style="color: #4b545c;">Riesgo</label>
                                        <div class="col-sm-8 pb-3">
                                            <select type="text" class="form-control" name="riesgo" id="riesgo">
                                                <option value="">--Seleccionar</option>
                                                @foreach ($riesgos as $riesgo)
                                                    @if ($riesgo['id_riesgo'] == old('riesgo'))
                                                        <option value="{{ $riesgo['id_riesgo'] }}" selected>
                                                            {{ $riesgo['nombre_riesgo'] }}</option>
                                                    @else
                                                        <option value="{{ $riesgo['id_riesgo'] }}">
                                                            {{ $riesgo['nombre_riesgo'] }}</option>
                                                    @endif
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
                                                @foreach ($cajas_compen as $caja_compen)
                                                    @if ($caja_compen['id_caja_compensac'] == old('caja_compensac'))
                                                        <option value="{{ $caja_compen['id_caja_compensac'] }}"
                                                            selected>
                                                            {{ $caja_compen['nombre_caja_compensac'] }}</option>
                                                    @else
                                                        <option value="{{ $caja_compen['id_caja_compensac'] }}">
                                                            {{ $caja_compen['nombre_caja_compensac'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button id="btnGuardarM5" type="submit"
                                        class="btn btn-success float-right">Guardar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="col-2"></div>
                    </div>
                    <!-------/Content Menu5-forms------->

                    <!-------Content Menu6-forms------->
                    <div class="tab-pane fade show" id="menu6" role="tabpanel">
                        <form enctype="multipart/form-data" action="{{ route('persona.archivo') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="id_persona" class="col-sm-4 col-form-label pb-3"
                                                style="color: #4b545c;">Nombre Colaborador</label>
                                            <div class="col-sm-8 pb-3">
                                                <select type="text" class="form-control" name="id_persona"
                                                    id="id_persona">
                                                    <option value="">--Seleccionar</option>
                                                    @foreach ($personas as $persona)
                                                        <option value="{{ $persona['id_persona'] }}">
                                                            {{ $persona['nombre'] }}
                                                            {{ $persona['primer_apellido'] }}
                                                            {{ $persona['segundo_apellido'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <section class="d-flex text-center">
                                                <div class="container d-flex justify-content-center">
                                                    <div class="row align-items-center justify-content-center">
                                                        <div class="col-10 my-8">
                                                            <label for="archivo" style="color: #4b545c;">Espacio exclusivo
                                                                para ingresar
                                                                archivos
                                                                y/o documentación requerida del colaborador.
                                                                <br><b>Únicamente en formato
                                                                    PDF.</b></label>
                                                            <form action="../../form-result.php" method="post"
                                                                enctype="multipart/form-data"
                                                                action="{{ route('persona.archivo') }}" target="_blank">
                                                                <input type="file" name="soporte" id="soporte">
                                                                <button id="btnGuardarM6" type="submit"
                                                                    class="btn btn-success btn-sm float-center">Cargar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-------/Content Menu6-forms------>
                    </div>
                </div>
            </div>
        </div>
        <!--Menu-Navbar y Content Menu-forms-->
    @endsection
    <!--Scripts-->
    @section('js')
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/colaboradorDatosPersonales.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/datosFamiliares.js') }}"></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
            $(document).ready(function(e) {                
                $('#foto').change(function() {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#foto_img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });     
            });
        </script>
    @endsection
