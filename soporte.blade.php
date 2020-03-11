@extends('plantillaContenido.plantillaIndex')

@section('css')

<!-- Data table -->
<!-- Materialice Iconos -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<!-- Fin data table -->

<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection
@section('fotoInicio')
<!--imagen-->
<div class="carousel-item white-text center-align" href="#one!">
    <div class="card-panel" style=" background-color:rgba( 29, 29, 29, 0.6 );">
        <h2>Registrar soportes tecnicos</h2>
        <p>Soporta tus mantenimientos y copias de seguridad con tranquilidad</p>
    </div>
</div>
<!--fin imagen-->
@endsection

@section('contenido')

<div class="row">
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#test1">Mantenimientos</a></li>
            <li class="tab col s3"><a class="" href="#test2">Copias de seguridad</a></li>
        </ul>
    </div>
    <div id="test1" class="col s12 t3">
        <!--boton Modal-->
        <a class="btn-floating btn-large waves-effect waves-light amber darken-4 modal-trigger" href="#modal1"><i
                class="material-icons">add</i></a>
        <!--fin boton Modal-->

        <!-- Modal-->
        <div id="modalMant" class="modal">
            <div class="modal-content">
                <!--titulo Formulario-->

                <div class="card-panel center-align" style="background-color:rgba( 29, 29, 29, 0.6 );">
                    <h5></h5>
                </div>
                <!-- fin titulo Formulario-->
                <!--fin Informacion Datos-->
                <div class="card-panel white-text blue darken-2 t2">Datos Mantenimiento</div>
                <ul class="collapsible popout">
                    <li class="active" id="datosresponsable">
                        {{-- - - - - - - - - - RESPONSABLE MANTENIMIENTO - - - - - - - - - --}}
                        <form class="col s12" id="frmcorreorespons" autocomplete="off">

                            <div class="col s12">
                                <div class="row card-panel">
                                    <div class="row">

                                        <div class="input-field col s6">
                                            {{-- - - - - - - - - - SELECT slcmarcadscduro - - - - - - - - --}}
                                            <select class="icons" id="slctipoMant" required>
                                                <option value="" disabled selected>TIPO MANTENIMIENTO</option>
                                            </select>
                                            <label for="slctipoMant">Mantenimiento</label>
                                            {{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}
                                        </div>

                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">textsms</i>
                                            {{-- - - - - - - - - - INPUT txtObservacion - - - - - - - - - --}}
                                            <input type="text" id="txtObservacion" class="validate" required>
                                            <label for="txtObservacion">Observaciones:</label>
                                            {{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}
                                        </div>
                                    </div>

                                    <div class="input-field col s6">
                                        {{-- - - - - - - - - - SELECT slcmarcadscduro - - - - - - - - --}}
                                        <select class="icons" id="slcusuario" required>
                                            <option value="" disabled selected>USUARIO ASIGNADO EN EQUIPO</option>
                                        </select>
                                        <label for="slcusuario">Usuario</label>
                                        {{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}
                                    </div>

                                    <div class="input-field col s6">
                                        {{-- - - - - - - - - - SELECT slcmarcadscduro - - - - - - - - --}}
                                        <select class="icons" id="slctecnico" required>
                                            <option value="" disabled selected>TECNICO ASIGNADO EN EQUIPO</option>
                                        </select>
                                        <label for="slctecnico">Tecnico</label>
                                        {{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}
                                    </div>

                                    <div class="equiposResponsable"></div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="center-align">
                                <button class="btn waves-effect waves-light" type="submit" name="action">GENERAR
                                    REGISTRO MANTENIMIENTO Y ARCHIVOS PDF
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <br>
                            <div class="center-align">
                                <button class="btn waves-effect waves-light" type="submit" name="action">SOPORTE PDF
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="action">HOJA DE VIDA
                                    PDF
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="action">FICHA TECNICA
                                    PDF
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                        {{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}
                    </li>
                </ul>

            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar<i
                        class="material-icons right">save</i></a>
            </div>
        </div>
        <!--fin Modal-->
        <div class="t3 b3">
            <div class="card-panel">
                        <div class="row ">
                <div class="input-field col s12">
                    <i class="material-icons prefix">textsms</i>
                    {{-- - - - - - - - - - INPUT slccorreo - - - - - - - - - --}}
                    <input
                        oninvalid="this.setCustomValidity(this.willValidate?'':'BUSCAR EL CORREO DE UN RESPONSABLE CON SUS PRIMERAS 3 LETRAS')"
                        maxlength="2" type="email" id="slccorreorespons" class="autocomplete validate" required>
                    <label for="slccorreorespons">Buscar Equipo Por Correo Responsable:</label>
                    {{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}
                </div>
            </div>
            <h3>Equipos Asignados del responsable</h3>
            <!--tabla-->
            <table id="tblEquipo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="10%">FOTO GENERAL</th>
                        <th width="10%">TIPO EQUIPO</th>
                        <th width="10%">NOMBRE EQUIPO</th>
                        <th width="10%">DEPENDENCIA</th>
                        <th width="10%">VER SOPORTE</th>
                    </tr>
                </thead>
                <tbody id="tbEquipo">
                </tbody>
            </table>
            <!--fin tabla-->
        </div>
    </div>
        <div class="t3 b3">
            <!--tabla-->
<div class="card-panel">
            <div class="row ">
                <div class="input-field col s12">
                    <i class="material-icons prefix">textsms</i>
                    {{-- - - - - - - - - - INPUT slccorreo - - - - - - - - - --}}
                    <input
                        oninvalid="this.setCustomValidity(this.willValidate?'':'BUSCAR EL CORREO DE UN RESPONSABLE CON SUS PRIMERAS 3 LETRAS')"
                        maxlength="2" type="email" id="slccorreorespons2" class="autocomplete validate" required>
                    <label for="slccorreorespons2">Buscar Mantenimiento Por Correo Responsable:</label>
                    {{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}
                </div>
            </div>

            <h3>Información de Mantenimientos</h3>

            <table id="tblEquipo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="10%">FECHA</th>
                        <th width="10%">USUARIO</th>
                        <th width="10%">TECNICO</th>
                        <th width="10%">OBSERVACION</th>
                        <th width="10%">VER FICHA TECNICA</th>
                    </tr>
                </thead>
                <tbody id="tbEquipo">
                </tbody>
            </table>
            <!--fin tabla-->
        </div>
        </div>
    </div>

</div>
    <div id="test2" class="col s12 t3">
        <!--boton Modal-->
        <a class="btn-floating btn-large waves-effect waves-light amber darken-4 modal-trigger" href="#municipio"><i
                class="material-icons">add</i></a>
        <!--fin boton Modal-->

        <!-- Modal-->
        <div id="municipio" class="modal">
            <div class="modal-content">
                <!--titulo Formulario-->
                <div class="card-panel center-align" style="background-color:rgba( 29, 29, 29, 0.6 );">
                    <h5>Agregar</h5>
                </div>
                <!-- fin titulo Formulario-->

                <div class="row">
                    <!--Formulario-->
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="first_name" type="text" class="validate">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                    </form>
                    <!--fin Formulario-->
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar<i
                        class="material-icons right">save</i></a>
            </div>
        </div>
        <!--fin Modal-->

        <div class="t3 b3">
            <!--tabla-->
            <table id="municipio">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>ZONA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>MAESTRO</th>
                    </tr>
                </tfoot>
            </table>
            <!--fin tabla-->
        </div>
    </div>
</div>

@endsection

@section('script')
<!--Data table-->
<script src="{{asset('js/datatables.min.js')}}"></script>
<!--Data table botones-->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<!--Fin data table botones-->
<!--Fin data table-->

<!--FORMULARIOS JS-->
<script src="{{asset('js/formSoporte.js')}}"></script>



<!--sweetalert2 alertas-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--Fin sweetalert2 alertas-->

@endsection
