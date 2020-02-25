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
        return view('index');
    });
    Route::get('registroEquipos', function () {
       return view('gestion');
    });
    Route::get('registrar', function () {
       return view('registarE');
    });
    Route::get('soporte', function () {
       return view('soporte');
    });
    Route::get('reader', function () {
       return view('reader');
    });

Route::post('frmDetalles', 'DetallesController@create')->name('insertDetalles');
Route::post('formMunicipio', 'MunicipioController@create')->name('insertMunicipio');

Route::post('actualizarMunicipio', 'MunicipioController@update')->name('actualizarMunicipio');

Route::post('formSede', 'SedeController@create')->name('insertSede');
Route::post('formResponsable', 'ResponsableController@create')->name('insertResponsable');
Route::post('validateCorreo', 'ResponsableController@emaildata')->name('emailValidate');

Route::post('traerCorreos', 'ResponsableController@emailrespons')->name('emailData');

Route::post('formSedeslc', 'SedeController@index')->name('slc');
Route::post('tbMunicipio', 'MunicipioController@index')->name('tbl');
Route::get('slcMunicipio', 'MunicipioController@slcZonas')->name('slczonas');
Route::post('inputMunicipio', 'MunicipioController@camposInputs')->name('formInputs');

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/


//TRAER MARCAS PC DE CONTROLLER
Route::get('getmarcaspc', 'DatosGeneralesController@slcMarcasPc')->name('selecmarcaspcs');
//TRAER MODELOS PCS DE CONTROLLER
Route::get('getmodelospc', 'DatosGeneralesController@slcModeloPc')->name('selecmodelospcs');
//TRAER ADQUISICIONES PCS DE CONTROLLER
Route::get('getadquisicionespcs', 'DatosGeneralesController@slcAdqscPc')->name('selecadquisicionespcs');
//TRAER TIPOS PCS DE CONTROLLER
Route::get('gettipospcs', 'DatosGeneralesController@slcTipoPc')->name('selectipospcs');
//TRAER TIPOS ENTRADAS MOUSE TECLADO DE CONTROLLER
Route::get('gettipentradatcldoxmouse', 'DatosGeneralesController@slcTipoEntradaTcldoM')->name('selectipoentradas');
//TRAER  MARCAS MONITOR DE CONTROLLER
Route::get('getmarcasmntor', 'DatosGeneralesController@slcMarcasMntor')->name('selecmarcasmonitor');
//TRAER  TECNOLOGIA   MONITOR DE CONTROLLER
Route::get('gettcnlogiamntor', 'DatosGeneralesController@slcTcnlogiaMntor')->name('selectecnologiamonitor');
//TRAER  ARQUITECUTRA   PROCESADOR DE CONTROLLER
Route::get('getarqtecturaprcsador', 'DatosGeneralesController@slcArqtectraPrcsdor')->name('selecarqtecturaprcsdor');
//TRAER  MARCAS PROCESADOR DE CONTROLLER
Route::get('getmarcasprcsador', 'DatosGeneralesController@slcMarcaPrcsdor')->name('selecmarcasprcsdor');
//TRAER  TECNOLOGIA PROCESADOR DE CONTROLLER
Route::get('gettcnlgiaprcsador', 'DatosGeneralesController@slcTecnlgiaPrcsdor')->name('selectecnlgiaprcsdor');
//TRAER  MARCAS RAM DE CONTROLLER
Route::get('getmarcasram', 'DatosGeneralesController@slcMarcaRam')->name('selecmarcasram');
//TRAER  TECNOLOGIA RAM DE CONTROLLER
Route::get('gettecnlgiaram', 'DatosGeneralesController@slcTecnlgiaRam')->name('selectecnologiaram');
//TRAER    MARCAS DISCO DURO DE CONTROLLER
Route::get('getmarcadiscduro', 'DatosGeneralesController@slcMarcaDiscoDuro')->name('selecmarcadiscduro');
//TRAER CONEXION DISCO DURO DE CONTROLLER
Route::get('getconexiondiscduro', 'DatosGeneralesController@slcConexionDiscDuro')->name('selecconexdicoduro');
//TRAER MARCAS DISCO DURO DE CONTROLLER
Route::get('getmarcasdiscduro', 'DatosGeneralesController@slcMarcasDiscDuro')->name('selecmarcasdicoduro');
//TRAER MARCAS UNIDAD OPTICA DE CONTROLLER
Route::get('getmarcasuoptica', 'DatosGeneralesController@slcMarcasUOptica')->name('selecmarcasuoptica');
//TRAER MARCAS UNIDAD OPTICA DE CONTROLLER
Route::get('getconexionuoptica', 'DatosGeneralesController@slcConexionUOptica')->name('selecconexuoptica');
//TRAER TARJETA EXPANSION DE CONTROLLER
Route::get('gettarjtaexpansion', 'DatosGeneralesController@chkTarjetaExpansion')->name('checktarjetaexpansion');
//TRAER SISTEMAS OPERATIVOS  SOFTWARE DE CONTROLLER
Route::get('getsistemsoftware', 'DatosGeneralesController@slcSistemSoftware')->name('selecsistemsoftware');
//TRAER ARQUITECTURA  SOFTWARE DE CONTROLLER
Route::get('getarqtrasoftware', 'DatosGeneralesController@slcArqtraSoftware')->name('selecarqtrasoftware');
//TRAER ANTIVIRUS  SOFTWARE  DE CONTROLLER
Route::get('getantvrussoftware', 'DatosGeneralesController@slcAntvrsSoftware')->name('selecanvrussoftware');
//TRAER RED IMPRESORA DE CONTROLLER
Route::get('getredimpresora', 'DatosGeneralesController@slcRedImpresora')->name('selecredimpresora');
//TRAER ZONA UBICACION DE CONTROLLER
Route::get('getzonaubcion', 'DatosGeneralesController@slcZonaUbcion')->name('seleczonaubcion');
//TRAER SEDE UBICACION DE CONTROLLER
Route::get('getsedeubcion', 'DatosGeneralesController@slcSedeUbcion')->name('selecsedeubcion');
//TRAER DEPENDENCIA UBICACION  DE CONTROLLER
Route::get('getdependubcion', 'DatosGeneralesController@slcDependUbcion')->name('selecdependubcion'); 


//INSERTAR IMAGEN JAJAJAJAJAJ
Route::post('inputsFile', 'DatosGeneralesController@returnimage')->name('formFile');


//AGREGAR MARCA 

Route::post('postcreatemarcaequipo', 'DatosGeneralesController@createMarca')->name('insertmarca');
//MODIFICAR MARCA 
Route::post('posteditmarcaequipo', 'DatosGeneralesController@editMarca')->name('updatemarca');

//AGREGAR MODELO 

Route::post('postcreatemodeloequipo', 'DatosGeneralesController@createModelo')->name('insertmodelo');
//MODIFICAR MODELO 
Route::post('posteditmodeloequipo', 'DatosGeneralesController@editModelo')->name('updatemodelo');



//AGREGAR TIPO EQUI´PO 
Route::post('postcreatetipequipo', 'DatosGeneralesController@createTipEquipo')->name('inserttipequipo');
//MODIFICAR TIPO EQUI´PO 
Route::post('postedittipequipo', 'DatosGeneralesController@editTipEquipo')->name('updatetipequipo');
//ELIMINAR TIPO EQUI´PO
Route::post('postdeletetipequipo', 'DatosGeneralesController@deleteTipEquipo')->name('deletetipequipo');


//AGREGAR TIPO TARJETA
Route::post('postcreatetiptrjta', 'TipTarjtaExpnController@createTipTrjta')->name('inserttiptrjta');
//MODIFICAR TIPO TARJETA
Route::post('postedittiptrjta', 'TipTarjtaExpnController@editTipTrjta')->name('updatetiptrjta');
//ELIMINAR TIPO TARJETA
Route::post('postdeletetiptrjta', 'TipTarjtaExpnController@deleteTipTrjta')->name('deletetiptrjta');