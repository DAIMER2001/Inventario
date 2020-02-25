<?php

namespace App\Http\Controllers;

use App\datos_generales;
use App\disco_duro_conexion;
use App\disco_duro_marcas;
use App\impresora_red; 
use App\mntor_tcnlgia;
use App\pc_adquisiciones;
use App\pc_marcas;  
use App\prcsdor_arq;
use App\prcsdor_marca;
use App\prcsdor_tecnologia;
use App\ram_marcas;
use App\ram_tecnologia;
use App\responsable;
use App\software_antivirus;
use App\software_arquitectura;
use App\software_conexion;
use App\tarjeta_expansion;
use App\tarjetae_tipo;
use App\tcldom_tipoentrada;
use App\teclado;
use App\u_optica_conexion;
use App\u_optica_marcas;
use App\ubicacion_dependencia;
use App\ubicacion_sede;
use App\ubicacion_zona;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs; 
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests; 
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\QueryException;
use DB;


class DatosGeneralesController extends Controller
{
       
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests; 
    //FORM PC
    public function slcMarcasPc()
    {          
           $marcas = pc_marcas::select('marcapc_id', 'nombre'  )->get();
            return   $marcas;
         
    }  
    public function slcAdqscPc()
    {          
           $Adqsc = pc_adquisiciones::select('adquisicionpc_id', 'nombre'  )->get();
            return   $Adqsc;
   
    } 
    //FORM MONITOR
    public function slcMarcasMntor()
    {          
           $marcasmntor = pc_marcas::select('marcapc_id', 'nombre'  )->get();
            return   $marcasmntor;
   
    }
    public function slcTcnlogiaMntor()
    {          
           $tcnlgiamntor = mntor_tcnlgia::select('tcnlgiamntor_id', 'nombre'  )->get();
            return   $tcnlgiamntor; 
    }
    //FORM PROCSADOR
    public function slcArqtectraPrcsdor()
    {          
           $arqprcsdor = prcsdor_arq::select('arqprcsdor_id', 'nombre'  )->get();
            return   $arqprcsdor; 
    }
    public function slcMarcaPrcsdor()
    {          
           $marcaprcsdor = prcsdor_marca::select('marcaprcsdor_id', 'nombre'  )->get();
            return   $marcaprcsdor; 
    }
    public function slcTecnlgiaPrcsdor()
    {          
           $tecnlgiaprcsdor = prcsdor_tecnologia::select('tcnlgiaprcsdor_id', 'nombre'  )->get();
            return   $tecnlgiaprcsdor; 
    }  
    //FORM RAM
    public function slcMarcaRam()
    {          
           $marcaram = ram_marcas::select('marcaram_id', 'nombre'  )->get();
            return   $marcaram; 
    }
    public function slcTecnlgiaRam()
    {          
           $tecnlgiaram = ram_tecnologia::select('tcnlgiaram_id', 'nombre'  )->get();
            return   $tecnlgiaram; 
    } 
    //FOROM DISCO DURO
    public function slcMarcaDiscoDuro()
    {          
           $marcadiscduro = disco_duro_marcas::select('marcasdiscoduro_id', 'nombre'  )->get();
            return   $marcadiscduro; 
    }
    public function slcConexionDiscDuro()
    {          
           $conexdiscduro = disco_duro_conexion::select('conexiondiscoduro_id', 'nombre'  )->get();
            return   $conexdiscduro; 
    }
    //FORM UNIODAD OPTICA
    public function slcMarcasUOptica()
    {          
           $marcauoptica = u_optica_marcas::select('marcasuoptica_id', 'nombre'  )->get();
            return   $marcauoptica; 
    }
    public function slcConexionUOptica()
    {          
           $conexuoptica = u_optica_conexion::select('conexuoptica_id', 'nombreconex'  )->get();
            return   $conexuoptica; 
    }  
   //---------------------------------------------------------------------------------------
    //FORM SOFTWARE
    public function slcSistemSoftware()
    {          
           $sistemsoftware = software_conexion::select('conexionsftwr_id', 'nombreconexion'  )->get();
            return   $sistemsoftware; 
    }   
    public function slcArqtraSoftware()
    {          
           $arqtrasoftware = software_arquitectura::select('arqtra_sftware_id', 'nombrearqtra'  )->get();
            return   $arqtrasoftware; 
    }   
    public function slcAntvrsSoftware()
    {          
           $antvrssoftware = software_antivirus::select('antvrus_sftware_id', 'nombreantivirus'  )->get();
            return   $antvrssoftware; 
    }   
    //FORM IMPRESORA 
    public function slcRedImpresora()
    {          
           $redimpresora = impresora_red::select('redimpr_id', 'nombrered'  )->get();
            return   $redimpresora; 
    }   
    //FORM UBICACION
    public function slcZonaUbcion()
    {          
           $zonaubcion = ubicacion_zona::select('zonaubc_id', 'nombrezona'  )->get();
            return   $zonaubcion; 
    }   
    public function slcSedeUbcion()
    {          
           $sedeubcion = ubicacion_sede::select('sedeubc_id', 'nombresede'  )->get();
            return   $sedeubcion; 
    }   
    public function slcDependUbcion()
    {          
           $dependubcion = ubicacion_dependencia::select('dependubc_id', 'nombredepend'  )->get();
            return   $dependubcion; 
    }  
    //CREAR MARCA 


    public function createMarca(Request $request )
    {          
        $nombremarca = $request->get('txtnombremarca'); 
        $data = array(
                'nombre'  =>  $nombremarca  
               ); 
        $marca= pc_marcas::all(); 
        $last = $marca->last(); 
        $lastid =     $last["marcapc_id"]; 
        DB::table('pcs_marca')
        ->where("marcapc_id",$lastid)
        ->update($data);  
         $data2 = array(
                'nombre'  =>  "NO APLICA"  
               ); 
        pc_marcas::insert($data2); 
                return response()->json(['success' => 'Marca agregado correctamente'],200);  
    }
    public function editMarca(Request $request )
    {          
        $nombremarca = $request->get('txtnombremarca'); 
        $lastid =   $request->get('id');   
        $data = array(
                'nombre'  =>  $nombremarca  
               );  
        DB::table('pcs_marca')
        ->where("marcapc_id",$lastid)
        ->update($data);   
       return response()->json(['success' => 'Marca editada correctamente'],200);   
    }  
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

       public function returnimage(Request $req)
       {
              $slccorreorespon =  $req->input('slccorreo');

              $txtnombrepc =  $req->input('nombrepc');
              $slcmarcapc =  $req->input('marcapc');
              $slcmodelopc =  $req->input('modelopc');
              $slctipopc =  $req->input('tipopc');
              $slcadqpc =  $req->input('adqscionpc');
              $txtacomprapc =  $req->input('añocomprapc');
              $slcplacapc =  $req->input('placapc');
              $slcserialpc =  $req->input('serialpc'); 

              $slccorreorespon =  $req->input('serialtcldo');
              $txtnombrepc =  $req->input('placatcldo');
              $slcmarcapc =  $req->input('entradatcldo');
              $slcmodelopc =  $req->input('marcatcldo');

              $slctipopc =  $req->input('marcamouse');
              $slcadqpc =  $req->input('entradamouse');
              $txtacomprapc =  $req->input('placamouse');
              $slcplacapc =  $req->input('serialmouse');

              $slcserialpc =  $req->input('marcamntor'); 
              $slccorreorespon =  $req->input('tecnlgmntor');
              $txtnombrepc =  $req->input('placamntor');
              $slcmarcapc =  $req->input('serialmntor');

              $slcmodelopc =  $req->input('arqtcprcsador'); 
              $slctipopc =  $req->input('marcaprcsador');
              $slcadqpc =  $req->input('tcnlgiaprcsador');
              $txtacomprapc =  $req->input('velcdprcsador');
              
              $slcplacapc =  $req->input('tecnlgiaram'); 
              $slcserialpc =  $req->input('marcaram');
              $slcmodelopc =  $req->input('cantidadram'); 
              $slctipopc =  $req->input('capacidadram');

              $slcadqpc =  $req->input('marcadscduro');
              $txtacomprapc =  $req->input('capacidaddscduro');
              $slcplacapc =  $req->input('tipoestadodscduro'); 

              $slcserialpc =  $req->input('conexionundoptca');
              $slcmodelopc =  $req->input('marcaundoptca'); 
              $slctipopc =  $req->input('serialundoptca');

              $slcadqpc =  $req->input('tpotrjta');

              $txtacomprapc =  $req->input('conexionsftware');

              $txtacomprapc =  $req->input('arqtcsftware');
              $slcplacapc =  $req->input('antvrssftware'); 

              $slcserialpc =  $req->input('tiporedimp');
              $slcmodelopc =  $req->input('drcimpred'); 
              $slctipopc =  $req->input('impresorared'); 

              $slcserialpc =  $req->input('sedeubcion');
              $slcmodelopc =  $req->input('dpndciaubcion');  
              
              $messages = [
                     'required' => 'el: campo es obligatorio'
              ];
              $Validator = Validator::make(
                     $req->all(),
                     [
                            'slccorreo' => 'required|email', //FORM RESPONSABLE -
                            'nombrepc' => 'required|string', //FORM DATOS GENERALES
                            'marcapc' => 'required|numeric',
                            'modelopc' => 'required|numeric',
                            'tipopc' => 'required|numeric',
                            'adqscionpc' => 'required|numeric',
                            'añocomprapc' => 'required|numeric',
                            'placapc' => 'required|string',
                            'serialpc' => 'required|string',
                            'img_serial_equipo' =>  'required|image|mimes:jpeg,jpg|max:2048',
                            'img_placa_equipo' =>  'required|image|mimes:jpeg,jpg|max:2048',
                            'img_general_equipo' => 'required|image|mimes:jpeg,jpg|max:2048', //-
                            'serialtcldo' => 'required|string', //FORM TECLADO
                            'placatcldo' => 'required|string',
                            'entradatcldo' => 'required|numeric',
                            'marcatcldo' => 'required|numeric',
                            'img_tcldo_placa' =>  'required|image|mimes:jpeg,jpg|max:2048',
                            'img_tcldo_serial' =>  'required|image|mimes:jpeg,jpg|max:2048', //-
                            'marcamouse' => 'required|numeric', //FORM MOUSE
                            'entradamouse' => 'required|numeric',
                            'placamouse' => 'required|string',
                            'serialmouse' =>  'required|string',
                            'img_mouse_placa' =>  'required|image|mimes:jpeg,jpg|max:2048',
                            'img_mouse_serial' =>  'required|image|mimes:jpeg,jpg|max:2048', //- 
                            'marcamntor' =>  'required|numeric', //FORM MONITOR
                            'tecnlgmntor' => 'required|numeric',
                            'placamntor' =>  'required|string',
                            'serialmntor' => 'required|string',
                            'img_mntor_serial' =>  'required|image|mimes:jpeg,jpg|max:2048',
                            'img_mntor_placa' =>  'required|image|mimes:jpeg,jpg|max:2048', //- 
                            'arqtcprcsador' => 'required|numeric', //FORM PROCESADOR
                            'marcaprcsador' =>  'required|numeric',
                            'tcnlgiaprcsador' =>  'required|numeric',
                            'velcdprcsador' => 'required|string', // -
                            'tecnlgiaram' =>  'required|numeric', //FORM RAM
                            'marcaram' => 'required|numeric',
                            'cantidadram' =>  'required|numeric',
                            'capacidadram' => 'required|numeric', //-
                            'conexiondscduro' =>  'required|numeric',
                            //FORM DISCO DURO
                            'marcadscduro' => 'required|numeric',
                            'capacidaddscduro' =>  'required|numeric',
                            //     'tipoestadodscduro' => 'required|numeric',  //-
                            'conexionundoptca' => 'required|numeric', //FORM U OPTICA
                            'marcaundoptca' =>  'required|numeric',
                            'serialundoptca' => 'required|string',  //-
                            //TARJETA EXPANSION
                            //     'tpotrjta' =>  'required|numeric', 
                            'conexionsftware' => 'required|numeric', //FORM SOFTWARE
                            'arqtcsftware' =>  'required|numeric',
                            'antvrssftware' => 'required|numeric',
                            //RED IMPRESORA
                            //     'tiporedimp' =>  'required|numeric',  
                            'drcimpred' => 'required|string',
                            'impresorared' =>  'required|numeric', //- 
                            //FORM UBICACION 
                            'sedeubcion' => 'required|numeric',
                            'dpndciaubcion' =>  'required|numeric',  //-
                     ],
                     $messages
              );
              if ($Validator->fails()) {
                     $Response = $Validator->messages();
                     return response()->json(['success' =>  $Response], 200);
              } else {
                     $datos_generales = datos_generales::all();
                     $last = $datos_generales->last();
                     if (!$last) {
                            $lastid = 1;
                     } else {
                            $lastid =  $last["datosgenerales_id"];
                     }
                     $nombreplacaimagen = $lastid . "_PLACA_" . date('Y-m-d') . ".jpg";
                     $nombreserialimagen = $lastid . "_SERIAL_" . date('Y-m-d') . ".jpg";
                     $nombregeneralimagen = $lastid . "_GENERAL_" . date('Y-m-d') . ".jpg";
                     //DATOS EQUIPO
                     $datosGeneralesEquipo = array(
                            'nombreEquipo' => $txtnombrepc,
                            'tipmarcaEquipo' => $slcmarcapc,
                            'tipmodeloEquipo' => $slcmodelopc,
                            'tipoEquipo' => $slctipopc,
                            'tipAdqEquipo' => $slcadqpc,
                            'anoCompraEquipo' => $txtacomprapc,
                            'placaEquipo' => $slcplacapc,
                            'serialEquipo' => $slcserialpc,
                            'fPlacaEquipo' => $nombreplacaimagen,
                            'fSerialEquipo' => $nombreserialimagen,
                            'fGeneralEquipo' => $nombregeneralimagen
                     );
                     //TECLADO
                     $datosTecladoEquipo = array(
                            'marcaTeclado' => $txtnombrepc,
                            'tipoEntraTeclado' => $slcmarcapc,
                            'placaTeclado' => $slcmodelopc,
                            'serialTeclado' => $slctipopc,
                            'fPlacaTeclado' => $slcmarcapc,
                            'fSerialTeclado' => $slcmodelopc
                     ); 
                     //MOUSE
                     $datosMouseEquipo = array(
                            'marcaMouse' => $txtnombrepc,
                            'tipoEntraMouse' => $slcmarcapc,
                            'placaMouse' => $slcmodelopc,
                            'serialMouse' => $slctipopc,
                            'fPlacaMouse' => $slcmodelopc,
                            'fSerialMouse' => $slctipopc
                     );
                     //MONITOR
                     $datosMonitorEquipo = array(
                            'marcaMonitor' => $txtnombrepc,
                            'tecnologiaMonitor' => $slcmarcapc,
                            'placaMonitor' => $slcmodelopc,
                            'serialMonitor' => $slctipopc,
                            'fPlacaMonitor' => $slcmodelopc,
                            'fSerialMonitor' => $slctipopc
                     );
                     //PROCESADOR
                     $datosProcesadorEquipo = array(
                            'arquitecturaProc' => $txtnombrepc,
                            'marcaProc' => $slcmarcapc,
                            'tecnologiaProc' => $slcmodelopc,
                            'velocidadProc' => $slctipopc
                     );
                     //RAM
                     $datosRamEquipo = array(
                            'tecnologiaRam' => $txtnombrepc,
                            'marcaRam' => $slcmarcapc,
                            'calidadRam' => $slcmodelopc,
                            'capasidadToRam' => $slctipopc
                     );
                     //DISC DURO
                     $datosDiscDuroEquipo = array(
                            'tipoConexDuscoD' => $txtnombrepc,
                            'marcaDiscoD' => $slcmarcapc,
                            'capacidadDiscoD' => $slcmodelopc,
                            'estadoSolDiscoD' => $slctipopc
                     );
                     //UN OPTICA
                     $datosUndOpticaEquipo = array(
                            'tipoUnidadOpt' => $txtnombrepc,
                            'marcaUnidadOpt' => $slcmarcapc,
                            'serialUnidadOpt' => $slcmodelopc
                     );
                     //TARJETA EXPANSION
                     $datosTrjtExpanEquipo = array(
                            'tipoTarjetaExpan' => $chknombrepc
                     );
                     //SOFTWARE
                     $datosSoftwareEquipo = array(
                            'sistemaOperSoft' => $txtnombrepc,
                            'arquitecturaSoft' => $slcmarcapc,
                            'antivirusSoft' => $slcmodelopc
                     );
                     $datosUbcEquipo = array(
                            'sedeUbica' => $slcmarcapc,
                            'dependenciaUbica' => $slcmodelopc
                     );

                     // $namePlacaEquipo = date('YmdHis'). "." .$imgPlacaEquipo->getClientOriginalExtension();
                     // $nameGeneralEquipo = date('YmdHis'). "." .$imgGeneralEquipo->getClientOriginalExtension();
                     // $imgSerialEquipoPath = $destinationPath."/". $slccorreorespon . $nameSerialEquipo
                     // $imgPlacaEquipo->move($destinationPath, $slccorreorespon );
                     // $imgGeneralEquipo->move($destinationPath, $slccorreorespon );

                     try {
                            //INSERT DATOS GENERALES
                            datos_generales::insert($datosGeneralesEquipo);
                            teclado::insert($datosTecladoEquipo);
                            datos_generales::insert($datosMouseEquipo);
                            teclado::insert($datosMonitorEquipo);
                            datos_generales::insert($datosProcesadorEquipo);
                            teclado::insert($datosRamEquipo);
                            datos_generales::insert($datosDiscDuroEquipo);
                            teclado::insert($datosUndOpticaEquipo);
                            datos_generales::insert($datosTrjtExpanEquipo);
                            teclado::insert($datosSoftwareEquipo);
                            teclado::insert($datosUbcEquipo);
                     } catch (QueryException $ex) {
                            dd($ex->getMessage());
                            return response()->json(['error' => $ex->getMessage()], 200);
                     }
                     //AGREGAR IMAGEN SERIAL EQUIPO

                     $datos_generales = datos_generales::all();
                     $last = $datos_generales->last();
                     $lastid =     $last["datosgenerales_id"];
                     $destinationPath = public_path('/uploads/' . $lastid . "_" . $slccorreorespon . "_" . date('Y-m-d') . "/" . $lastid);
                     if ($req->hasFile('img_serial_equipo')) {
                            $imgSerialEquipo = $req->file('img_serial_equipo');
                            $nameSerialEquipo = $lastid . "_SERIAL_" . date('Y-m-d') . "." . $imgSerialEquipo->getClientOriginalExtension();
                            $imgSerialEquipo->move($destinationPath, $nameSerialEquipo);
                     } else {
                            return "archivos no guardados";
                     }
                     //AGREGAR IMAGEN PLACA EQUIPO 
                     if ($req->hasFile('img_placa_equipo')) {
                            $imgPlacaEquipo = $req->file('img_placa_equipo');
                            $namePlacaEquipo = $lastid . "_PLACA_" . date('Y-m-d') . "." . $imgPlacaEquipo->getClientOriginalExtension();
                            $imgPlacaEquipo->move($destinationPath, $namePlacaEquipo);
                     } else {
                            return "archivos no guardados";
                     }
                     //AGREGAR IMAGEN GENERAL EQUIPO 
                     if ($req->hasFile('img_general_equipo')) {
                            $imgGeneralEquipo = $req->file('img_general_equipo');
                            $nameGeneralEquipo = $lastid . "_GENERAL_" . date('Y-m-d') . "." . $imgGeneralEquipo->getClientOriginalExtension();
                            $imgGeneralEquipo->move($destinationPath, $nameGeneralEquipo);
                     } else {
                            return "archivos no guardados";
                     }
                     return response()->json(['success' => 'Responsable agregado correctamente'], 200);
              }
    
           
      
                 
        //obtenemos el campo FILE 
        // $file = $request->get('file_image_serial');

        //obtenemos el nombre
        // $nombre = $file->getClientOriginalName();}
            // $nombre ="ohmygod";
        //indimamos que queremos guardatr en un nuevo archivo 
        // \Storage::disk('local')->put($nombre, \File::get($file));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img_serial_equipo')){
            $file = $request->file('img_serial_equipo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/'. $name);
            return $name;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\datos_generales  $datos_generales
     * @return \Illuminate\Http\Response
     */
    public function show(datos_generales $datos_generales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\datos_generales  $datos_generales
     * @return \Illuminate\Http\Response
     */
    public function edit(datos_generales $datos_generales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\datos_generales  $datos_generales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datos_generales $datos_generales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\datos_generales  $datos_generales
     * @return \Illuminate\Http\Response
     */
    public function destroy(datos_generales $datos_generales)
    {
        //
    }
}
