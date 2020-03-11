<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
/*Rutas vistas*/
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/Gestion_Administrativa', 'GestionController@index')->name('Gestion_Administrativa')->middleware('auth');
Route::get('/registro_Equipos', 'EquipoController@index')->name('registroE_quipos')->middleware('auth');
Route::get('/registro_Terminales', 'TerminalController@index')->name('terminalE_quipos')->middleware('auth');
Route::get('/soporte', 'SoporteController@index')->name('soporte')->middleware('auth');
/*Route::get('/reader', 'HomeController@index')->name('reader')->middleware('auth');*/
/*Fin rutas vistas*/



   /* Route::get('registrar', function () {
       return view('gestion');
    });
    Route::get('registroEquipos', function () {
       return view('registarE');
    });
    Route::get('soporte', function () {
       return view('soporte');
    });
    Route::get('reader', function () {
       return view('reader');
    });
/*Fin rutas vistas*/

/*Rutas agregar*/
Route::post('formDependencia', 'DependenciaController@create')->name('insertDependencia');
Route::post('formZona', 'ZonaController@create')->name('insertZona');
Route::post('frmDetalles', 'DetallesController@create')->name('insertDetalles');
Route::post('formMunicipio', 'MunicipioController@create')->name('insertMunicipio');
Route::post('formSede', 'SedeController@create')->name('insertSede');
Route::post('formResponsable', 'ResponsableController@create')->name('insertResponsable');
/*Fin rutas agregar*/

/*Rutas consultar*/
Route::post('consultaDependencia', 'DependenciaController@edit');
Route::post('consultaZona', 'ZonaController@edit');
Route::post('consultaDetalle', 'DetallesController@edit');
Route::post('consultaMunicipio', 'MunicipioController@edit');
Route::post('consultaSede', 'SedeController@edit');
Route::post('consultaResponsable', 'ResponsableController@edit');
/*fin rutas consultar*/

/*Rutas actualizar*/
Route::post('actualizarDependencia', 'DependenciaController@update');
Route::post('actualizarZona', 'ZonaController@update');
Route::post('actualizarDetalle', 'DetallesController@update');
Route::post('actualizarMunicipio', 'MunicipioController@update');
Route::post('actualizarSede', 'SedeController@update');
Route::post('actualizarResponsable', 'ResponsableController@update');
/*fin rutas actualizar*/

/*Rutas eliminar*/
Route::post('deleteDependencia', 'DependenciaController@destroy');
Route::post('deleteZona', 'ZonaController@destroy');
Route::post('deleteMunicipio', 'MunicipioController@destroy');
Route::post('deleteSede', 'SedeController@destroy');
Route::post('deleteResponsable', 'ResponsableController@destroy');
/*fin rutas eliminar*/

/*Ruta select*/

Route::post('traerCorreo', 'ResponsableController@emailrespons')->name('emailData');
Route::post('formZonaslc', 'MunicipioController@zonaSlc');
Route::post('formSedeslc', 'SedeController@sedeSlc');
Route::post('formSedeResponslc', 'ResponsableController@sedeSlc');
Route::post('formDependenciaslc', 'ResponsableController@dependenciaSlc');
/*fin ruta select*/

/*Rutas tablas*/
Route::post('tblDependencia', 'DependenciaController@index');
Route::post('tblZona', 'ZonaController@index');
Route::post('tblMunicipio', 'MunicipioController@index');
Route::post('tblSede', 'SedeController@index');
Route::post('tblResponsable', 'ResponsableController@index');
/*Fin rutas tablas*/


// //TRAER ADQUISICIONES PCS DE CONTROLLER
// Route::get('getadquisicionespcs', 'DatoGeneralController@slcAdqscPc')->name('selecadquisicionespcs');
// //TRAER  TECNOLOGIA   MONITOR DE CONTROLLER
// Route::get('gettcnlogiamntor', 'DatoGeneralController@slcTcnlogiaMntor')->name('selectecnologiamonitor');
// //TRAER SISTEMAS OPERATIVOS  SOFTWARE DE CONTROLLER
// Route::get('getsistemsoftware', 'DatoGeneralController@slcSistemSoftware')->name('selecsistemsoftware');
// //TRAER ANTIVIRUS  SOFTWARE  DE CONTROLLER
// Route::get('getantvrussoftware', 'DatoGeneralController@slcAntvrsSoftware')->name('selecanvrussoftware');
// //TRAER RED IMPRESORA DE CONTROLLER
// Route::get('getredimpresora', 'DatoGeneralController@slcRedImpresora')->name('selecredimpresora');


//AGREGAR MARCA

Route::post('postcreatemarcaequipo', 'DatoGeneralController@createMarca')->name('insertmarca');
//MODIFICAR MARCA
Route::post('posteditmarcaequipo', 'DatoGeneralController@editMarca')->name('updatemarca');


//FORMULARIO SOPORTE




//INSERT

Route::post('postEquiposAsignados', 'EquiposAsignadosController@equiposRespons');



// --------------------------------------------------------------------------------------------
//  RUTA AGREGAR

//INSERTAR EQUIPO
Route::post('insertEquipo', 'DatoGeneralController@create');
//DISCO DURO
Route::post('postcreatemarcadiscduro', 'TipMarcaDiscDController@create');
//RAM
Route::post('getcreateram', 'TipMarcaRamController@create');
//PC
Route::post('postcreatetipopc', 'TipEquipoController@create');
//monitor
Route::post('postcreatetecnologiamntor', 'TipTecnologiaMonController@create');
//ARQUITECTURA
Route::post('postcreatearqtectura', 'TipArquitecturaController@create');
//Procesador
Route::post('postcreatetecnprcsador', 'TipTecnProcController@create');
Route::post('postcreatemarcaprcsador', 'TipMarcaProcController@create');
//EQUIPO
Route::post('postcreatetipentrada', 'TipEntradaController@create');// Tipo Entrada -
Route::post('postcreatetipequipo', 'TipEquipoController@create');//Tipo Equipo -
Route::post('postcreatemodeloequipo', 'TipModeloEquipoController@create');//Modelo -
//Tarjeta
Route::post('postcreatetiptrjta', 'TipTarjtaExpnController@create');


// Route::get('postmarcasuoptica', 'TipMarcaUndOController@create');  //Marca Unidad Optica -
// Route::post('postcreatetiptrjta', 'TipTarjtaExpnsionController@createTipTrjta'); //Tarjeta Expansion
// Route::post('postcreatemarcaequipo', 'TipMarcaEquipoController@createMarca');//Marca Equipo
// Route::post('formDependencia', 'DependenciaController@create');//Dependencia
// Route::post('formZona', 'ZonaController@create');//X
// Route::post('frmDetalles', 'DetallesController@create');//Detalles
// Route::post('formMunicipio', 'MunicipioController@create');//Municipio
// Route::post('formSede', 'SedeController@create');//Sede
// Route::post('formResponsable', 'ResponsableController@create');//Responsable


// FIN RUTA AGREGAR
// --------------------------------------------------------------------------------------------
// RUTA EDITAR

 //Tarjeta
Route::post('postedittiptrjta', 'TipTarjtaExpnController@edit');
//EQUIPO
Route::post('posteditentrada', 'TipEntradaController@edit');// Tipo Entrada -
Route::post('postedittipequipo', 'TipEquipoController@edit');// TipoEquipo -
Route::post('posteditmodeloequipo', 'TipModeloEquipoController@edit');//Modelo -
Route::post('postedittipopc', 'TipEquipoController@edit');
//PC
Route::post('postedittecnologiamntor', 'TipTecnologiaMonController@edit');
//DISCO DURO
Route::post('posteditmarcadiscduro', 'TipMarcaDiscDController@edit');
//ARQUITECTURA
Route::post('posteditarqtectura', 'TipArquitecturaController@edit');
//PROCESADOR
Route::post('postedittecnprcsador', 'TipTecnProcController@edit');
Route::post('posteditmarcaprcsador', 'TipMarcaProcController@edit');
//ram-
Route::post('posttecnlgiaram', 'TipTecnRamController@edit');
Route::post('posteditram', 'TipMarcaRamController@edit');
//Unidad Optica
Route::get('posteditmarcauoptica', 'TipMarcaUndOController@edit');
// Route::post('consultaDependencia', 'DependenciaController@edit'); //Dependencia
// Route::post('consultaZona', 'ZonaController@edit');//Zona
// Route::post('consultaDetalle', 'DetallesController@edit');//Detalles
// Route::post('consultaMunicipio', 'MunicipioController@edit');//Municipio
// Route::post('consultaSede', 'SedeController@edit');//Sede
// Route::post('consultaResponsable', 'ResponsableController@edit');//Responsable
// Route::post('postedittiptrjta', 'TipTarjtaExpnsionController@editTipTrjta');//Tarjeta Expansion
// Route::post('posteditmarcaequipo', 'TipMarcaEquipoController@editMarca');//Marca Teclado - Mouse
// Route::get('postadquisicion', 'TipAdquisicionController@edit');//Adquisiciones -
// Route::post('actualizarDependencia', 'DependenciaController@update');//Dependencia
// Route::post('actualizarZona', 'ZonaController@update');//Zona
// Route::post('actualizarDetalle', 'DetallesController@update');//Detalles
// Route::post('actualizarMunicipio', 'MunicipioController@update');//Municipio
// Route::post('actualizarSede', 'SedeController@update');//Sede
// Route::post('actualizarResponsable', 'ResponsableController@update'); //Responsable


// /*FIN RUTA EDITAR  ---------------------------------------------------------------------------------*/



// /*RUTA SELECT  ----------------------------------------------------------------------------------------*/

//SOPORTE
//Usuario
Route::get('getUsuActivo', 'SoporteController@getUsuario');
//PC -> Monitor
Route::get('gettecnologiamntor', 'TipTecnologiaMonController@slc');
//EQUIPO -> Adquisicion - equipo - tipo  - modelo
Route::get('getadquisicionpc', 'TipAdquisicionController@slc');
Route::get('getmarcapc', 'TipMarcaEquipoController@slc');
Route::get('gettipomant', 'MantenimientoController@slc');
Route::get('getslcmodeloequipo', 'TipModeloEquipoController@slc');
//TECLADO MOUSE -> Tipo entrada
Route::get('getslctipentrada', 'TipEntradaController@slc');
Route::get('gettipopc', 'TipEquipoController@slc');
//ARQUITECTURA
Route::get('getarquitectura', 'TipArquitecturaController@slc');
//PROCESADOR
Route::get('getmarcaprcsador', 'TipMarcaProcController@slc');
Route::get('gettcnlgiaprcsador', 'TipTecnProcController@slc');
//DISCO DURO
Route::get('getmarcadiscduro', 'TipMarcaDiscDController@slc');
Route::get('getconexiondiscduro', 'TipConexDiscDController@slc');
//RAM
Route::get('getmarcaram', 'TipMarcaRamController@slc');
Route::get('gettecnlgiaram', 'TipTecnRamController@slc');
//RESPONSABLE
Route::post('traerCorreos', 'ResponsableController@emailrespons');//Correo
Route::post('formSedeResponslc', 'ResponsableController@sedeSlc'); // Responsable
//UNIDAD OPTICA
Route::get('getmarcauoptica', 'TipMarcaUndOController@slc');
Route::get('getconexionuoptica', 'TipConexUndOController@slc');
//TARJETA EXPANSION
Route::get('gettarjtaexpansion', 'TipTarjtaExpnController@chk');

//SOFTWARE
Route::get('getredimpresora', 'TipRedImpController@slc');
Route::get('getsistemsoftware', 'TipSistemSoftController@slc');
Route::get('getantvrussoftware', 'TipAntSofController@slc');
//UBICACION

//SELECT UBICACION
Route::get('getmunicipioubcion', 'MunicipioUbcacionController@slc');
Route::post('getsedeubcion', 'TipSedeUbcacionController@slcSedeUbcion');
Route::post('getdependubcion', 'TipDependenciaUbcacionController@slcDependUbcion');
Route::post('formDependenciaslc', 'ResponsableController@dependenciaSlc');
Route::post('formZonaslc', 'MunicipioController@zonaSlc');
Route::post('formSedeslc', 'SedeController@sedeSlc');
//


// /*FIN RUTA SELECT  --------------------------------------------------------------------------------------------*/



// /*RUTA TABLA --------------------------------------------------------------------------------------------------*/


Route::get('getMantActivo', 'SoporteController@getMantenimiento');
Route::post('postequiporespon', 'ResponsableController@equiporespons');//Correo
// Route::post('tblDependencia', 'DependenciaController@index');
// Route::post('tblZona', 'ZonaController@index');
// Route::post('tblMunicipio', 'MunicipioController@index');
// Route::post('tblSede', 'SedeController@index');
// Route::post('tblResponsable', 'ResponsableController@index');


// /*FIN RUTA TABLA ----------------------------------------------------------------------------------------------*/
// /*RUTA ELIMINAR ------------------------------------------------------------------------------------*/


//RAM
Route::post('getdeleteram', 'TipMarcaRamController@delete');
//procesador
Route::post('postdeletetecnprcsador', 'TipTecnProcController@delete');
Route::post('postdeletemarcaprcsador', 'TipMarcaProcController@delete');
//ARQUITECTURA
Route::post('postdeletearquitectura', 'TipArquitecturaController@delete');
//equipo
Route::post('postdeletemodeloequipo', 'TipModeloEquipoController@delete');//Modelo -
Route::post('postdeletetipentrada', 'TipEntradaController@delete');// Tipo Entrada -
Route::post('postdeletetipequipo', 'TipEquipoController@delete');// Tipo Equipo -
//pc
Route::post('postdeletetipopc', 'TipEquipoController@delete');
Route::post('postdeletetecnologiamntor', 'TipTecnologiaMonController@delete');

//Tarjeta-
Route::post('postdeletetiptrjta', 'TipTarjtaExpnController@delete');
// Route::post('postadquisicionespcs', 'TipAdquisicionController@delete');//Adquisicion equipo -
//Unidad Optica
Route::get('postdeletemarcauoptica', 'TipMarcaUndOController@delete');
// //Marca Equipo - Teclado - Mouse
// Route::post('deletemarcaequipo', 'TipMarcaEquipoController@deleteTipMarca');
// //Tipo Tarjeta
// Route::post('postdeletetiptrjta', 'TipTarjtaExpnsionController@deleteTipTrjta');
// // Dependencia
// Route::post('deleteDependencia', 'DependenciaController@destroy');
// Route::post('deleteZona', 'ZonaController@destroy');
// // Municipio
// Route::post('deleteMunicipio', 'MunicipioController@destroy');
// // Sede
// Route::post('deleteSede', 'SedeController@destroy');
// // Responsable
// Route::post('deleteResponsable', 'ResponsableController@destroy');


/*FIN RUTA ELIMINAR    -------------------------------------------------------------------------------*/
