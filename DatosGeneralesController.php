<?php

namespace App\Http\Controllers;

use App\datos_generales;
use App\disco_duro;
use App\disco_duro_conexion;
use App\disco_duro_marcas;
use App\impresora_red; 
use App\mntor_tcnlgia;
use App\monitor;
use App\MouseEquipo;
use App\pc_adquisiciones;
use App\pc_marcas;
use App\pc_modelos;
use App\pc_tipos;
use App\prcsdor_arq;
use App\prcsdor_marca;
use App\prcsdor_tecnologia;
use App\procesador;
use App\ram;
use App\ram_marcas;
use App\ram_tecnologia;
use App\responsable;
use App\software;
use App\software_antivirus;
use App\software_arquitectura;
use App\software_conexion;
use App\tarjeta_expansion;
use App\tarjetae_tipo; 
use App\teclado;
use App\u_optica_conexion;
use App\u_optica_marcas;
use App\ubicacion_actual;
use App\ubicacion_dependencia;
use App\ubicacion_sede;
use App\ubicacion_zona;
use App\unidad_optica;
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
    public function slcModeloPc()
    {          
           $modelos = pc_modelos::select('modelopc_id', 'nombremodelo'  )->get();
            return   $modelos;
   
    }
    
    public function slcTipoPc()
    {          
           $tipospc = pc_tipos::select('tipopc_id', 'nombre'  )->get();
            return   $tipospc;
         
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
    //FORM TARJETA EXPANSION
    public function chkTarjetaExpansion()
    {          
           $tarjetaexpansion = tarjetae_tipo::select('tipotarjetae_id', 'nombretarjeta')->get();
            return   $tarjetaexpansion; 
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
    //CREAR MODELO 
    public function createModelo(Request $request )
    {          
        $nombremodelo = $request->get('txtnombremodelo'); 
        $data = array(
                'nombremodelo'  =>  $nombremodelo  
               ); 
        $modelo= pc_modelos::all(); 
        $last = $modelo->last(); 
        $lastid =     $last["modelopc_id"]; 
        DB::table('pcs_modelo')
        ->where("modelopc_id",$lastid)
        ->update($data);  
         $data2 = array(
                'nombremodelo'  =>  "NO APLICA"  
               ); 
        pc_marcas::insert($data2); 
                return response()->json(['success' => 'Modelo agregado correctamente'],200);  
    }
    //EDITAR MODELO
    public function editModelo(Request $request )
    {          
        $nombremodelo = $request->get('txtnombremodelo'); 
        $lastid =   $request->get('id');   
        $data = array(
                'nombremodelo'  =>  $nombremodelo  
               );  
        DB::table('pcs_modelo')
        ->where("modelopc_id",$lastid)
        ->update($data);   
       return response()->json(['success' => 'Modelo editado correctamente'],200);   
    }
    /**SS
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
       public function returnimage(Request $req)
       {
              //CORREO
              $slccorreorespon =  $req->input('slccorreo'); 
              //PC
              $txtnombrepc =  $req->input('nombrepc');
              $slcmarcapc =  $req->input('marcapc');
              $slcmodelopc =  $req->input('modelopc');
              $slctipopc =  $req->input('tipopc'); 
              $txtacomprapc =  $req->input('añocomprapc');
              $txtplacapc =  $req->input('placapc');
              $txtserialpc =  $req->input('serialpc'); 

              $txtserialtcldo =  $req->input('serialtcldo');
              $txtplacatcldo =  $req->input('placatcldo');
              $slcentradatcldo =  $req->input('entradatcldo');
              $slcmarcatcldo =  $req->input('marcatcldo');

              $slcmarcamouse =  $req->input('marcamouse');
              $slcentradamouse =  $req->input('entradamouse');
              $txtplacamouse =  $req->input('placamouse');
              $txtserialmouse =  $req->input('serialmouse');

              $slcmarcamntor =  $req->input('marcamntor'); 
              $slctecnlgmntor =  $req->input('tecnlgmntor');
              $txtplacamntor =  $req->input('placamntor');
              $txtserialmntor =  $req->input('serialmntor');

              $slcarqtcprcsador =  $req->input('arqtcprcsador'); 
              $slcmarcaprcsador =  $req->input('marcaprcsador');
              $slctcnlgiaprcsador =  $req->input('tcnlgiaprcsador');
              $txtvelcdprcsador =  $req->input('velcdprcsador');
              
              $slctecnlgiaram =  $req->input('tecnlgiaram'); 
              $slcmarcaram=  $req->input('marcaram');
              $txtcantidadram =  $req->input('cantidadram'); 
              $txtcapacidadram=  $req->input('capacidadram');

              $slcmarcadscduro =  $req->input('marcadscduro');
              $slcconexiondscduro =  $req->input('conexiondscduro');
              $txtcapacidaddscduro =  $req->input('capacidaddscduro');
              $slctipoestadodscduro=  $req->input('tipoestadodscduro'); 

              $slcconexionundoptca=  $req->input('conexionundoptca');
              $slcmarcaundoptca=  $req->input('marcaundoptca'); 
              $txtserialundoptca =  $req->input('serialundoptca');

              $slcadqpc =  $req->input('idsCheckTarjetas');

              $txtconexionsftware =  $req->input('conexionsftware');

              $txtarqtcsftware =  $req->input('arqtcsftware');
              $slcantvrssftware=  $req->input('antvrssftware'); 

              $slctiporedimp=  $req->input('tiporedimp');
              $nmbdrcimpred =  $req->input('drcimpred'); 
              $slcimpresorared =  $req->input('impresorared'); 
 
              $slcdpndciaubcion =  $req->input('dpndciaubcion');  
              
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
                            'img_serial_equipo' =>  'required|image|mimes:jpeg,jpg ',
                            'img_placa_equipo' =>  'required|image|mimes:jpeg,jpg ',
                            'img_general_equipo' => 'required|image|mimes:jpeg,jpg ', //-
                            'serialtcldo' => 'required|string', //FORM TECLADO
                            'placatcldo' => 'required|string',
                            'entradatcldo' => 'required|numeric',
                            'marcatcldo' => 'required|numeric',
                            'img_tcldo_placa' =>  'required|image|mimes:jpeg,jpg ',
                            'img_tcldo_serial' =>  'required|image|mimes:jpeg,jpg ', //-
                            'marcamouse' => 'required|numeric', //FORM MOUSE
                            'entradamouse' => 'required|numeric',
                            'placamouse' => 'required|string',
                            'serialmouse' =>  'required|string',
                            'img_mouse_placa' =>  'required|image|mimes:jpeg,jpg ',
                            'img_mouse_serial' =>  'required|image|mimes:jpeg,jpg ', //- 
                            'marcamntor' =>  'required|numeric', //FORM MONITOR
                            'tecnlgmntor' => 'required|numeric',
                            'placamntor' =>  'required|string',
                            'serialmntor' => 'required|string',
                            'img_mntor_serial' =>  'required|image|mimes:jpeg,jpg ',
                            'img_mntor_placa' =>  'required|image|mimes:jpeg,jpg ', //- 
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
                            'idsCheckTarjetas' =>  'required|array|min:1', 
                            'conexionsftware' => 'required|numeric', //FORM SOFTWARE
                            'arqtcsftware' =>  'required|numeric',
                            'antvrssftware' => 'required|numeric',
                            //RED IMPRESORA
                            //     'tiporedimp' =>  'required|numeric',  
                            'drcimpred' => 'required|string',
                            'impresorared' =>  'required|numeric', //- 
                            //FORM UBICACION  
                            'dpndciaubcion' =>  'required|numeric',  //-
                     ],
                     $messages
              );
              if ($Validator->fails()) {
                     $Response = $Validator->messages();
                     return response()->json(['success' =>  $Response], 200);
              } else {
                       //TARJETA EXPANSION
                     // return $slcadqpc;
                     //       return   $slcadqpc ; s
                     // $arrayIds = explode(",", $slcadqpc); 
                     // $datosTrjtExpanEquipo=[] ;
                     // $caracteres = preg_split('//', $slcadqpc, -1, PREG_SPLIT_NO_EMPTY);
                     // $arr1 = str_split($slcadqpc, 1);
                    
              //     return $caracteres; 

             foreach($slcadqpc as $key=> $val){
              //     return    $idsexplode[$key+1];

                     $idsexplode = explode(",",$val); 
                
             }
             
             foreach($idsexplode as $key ){
              //     return    $idsexplode[$key+1];
 
                     $datosTrjtExpanEquipo   = [
                            'equipo_id' =>"1", //id del equipo asig
                            'tipoTarjetaExpan' =>$key
                     ];
                     // $i++;
                 tarjeta_expansion::insert($datosTrjtExpanEquipo);
             }  
                     
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
                     // DATOS EQUIPO
                     $datosGeneralesEquipo = array(
                            'nombreEquipo' => $txtnombrepc,
                            'tipmarcaEquipo' => $slcmarcapc,
                            'tipmodeloEquipo' => $slcmodelopc,
                            'tipoEquipo' => $slctipopc,
                            'tipAdqEquipo' => $slcadqpc,
                            'anoCompraEquipo' => $txtacomprapc,
                            'placaEquipo' => $txtplacapc ,
                            'serialEquipo' => $txtserialpc ,
                            'fPlacaEquipo' => $nombreplacaimagen,
                            'fSerialEquipo' => $nombreserialimagen,
                            'fGeneralEquipo' => $nombregeneralimagen
                     );
                     //TECLADO
                     $datosTecladoEquipo = array(
                            'marcaTeclado' => $slcmarcatcldo ,
                            'tipoEntraTeclado' => $slcentradatcldo,
                            'placaTeclado' => $txtplacatcldo,
                            'serialTeclado' => $txtserialtcldo ,
                            'fPlacaTeclado' => $nombreplacaimagen,
                            'fSerialTeclado' => $nombreserialimagen
                     );  
                     //MOUSE
                     $datosMouseEquipo = array(
                            'marcaMouse' => $slcmarcamouse ,
                            'tipoEntraMouse' => $slcentradamouse ,
                            'placaMouse' =>  $txtplacamouse,
                            'serialMouse' =>   $txtserialmouse,
                            'fPlacaMouse' => $nombreplacaimagen,
                            'fSerialMouse' => $nombreserialimagen
                     ); 
                     //MONITOR
                     $datosMonitorEquipo = array(
                            'marcaMonitor' => $slcmarcamntor ,
                            'tecnologiaMonitor' => $slctecnlgmntor ,
                            'placaMonitor' => $txtplacamntor ,
                            'serialMonitor' =>  $txtserialmntor ,
                            'fPlacaMonitor' => $nombreplacaimagen,
                            'fSerialMonitor' => $nombreserialimagen
                     ); 
                     //PROCESADOR
                     $datosProcesadorEquipo = array(
                            'arquitecturaProc' =>  $slcarqtcprcsador,
                            'marcaProc' => $slcmarcaprcsador ,
                            'tecnologiaProc' => $slctcnlgiaprcsador ,
                            'velocidadProc' =>    $txtvelcdprcsador
                     ); 
                     //RAM  
                     $datosRamEquipo = array(
                            'tecnologiaRam' =>   $slctecnlgiaram ,
                            'marcaRam' =>   $slcmarcaram,
                            'calidadRam' =>  $txtcantidadram ,
                            'capacidadToRam' => $txtcapacidadram
                     ); 
                     //DISC DURO
                     $datosDiscDuroEquipo = array(
                            'tipoConexDuscoD' =>  $slcconexiondscduro,
                            'marcaDiscoD' => $slcmarcadscduro,
                            'capacidadDiscoD' =>  $txtcapacidaddscduro ,
                            'estadoSolDiscoD' =>  $slctipoestadodscduro
                     );
                     //UN OPTICA
                     $datosUndOpticaEquipo = array(
                            'tipoUnidadOpt' => $slcconexionundoptca,
                            'marcaUnidadOpt' => $slcmarcaundoptca ,
                            'serialUnidadOpt' => $txtserialundoptca 
                     );
                     //SOFTWARE
                     $datosSoftwareEquipo = array(
                            'sistemaOperSoft' =>  $txtconexionsftware,
                            'arquitecturaSoft' =>  $txtarqtcsftware,
                            'antivirusSoft' => $slcantvrssftware   
                     ); 
                     //IMPRESORA 
                     $datosRed =   array(
                            'tipoRedConfigRed' =>$slctiporedimp,
                            'ipImpreConfigRed' =>$nmbdrcimpred,
                            'redImpreConfigRed' =>$slcimpresorared
                     );
                     //UBICACION
                     $datosUbcEquipo = array( 
                            'responsable_id' => "1",
                            'dependenciaUbica' =>  $slcdpndciaubcion 
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
                            MouseEquipo::insert($datosMouseEquipo);
                            monitor::insert($datosMonitorEquipo);
                            procesador::insert($datosProcesadorEquipo);
                            ram::insert($datosRamEquipo);
                            disco_duro::insert($datosDiscDuroEquipo);
                            unidad_optica::insert($datosUndOpticaEquipo);
                            software::insert($datosSoftwareEquipo);
                            ubicacion_actual::insert($datosUbcEquipo);
                            impresora_red::insert( $datosRed);
                           
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
