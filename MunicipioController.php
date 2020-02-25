<?php

namespace App\Http\Controllers;

use App\municipio;
use App\zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class MunicipioController extends Controller
{ 
    public function camposInputs(Request $req)
    {  
        $id =  $req->input('id');
        $municipios = municipio::join('zonamunicipios' , 'zonamunicipios.zona_id', '=', 'municipios.zonaMunicipio')
        ->select('municipio_id', 'nombreMunicipio', 'zona_id' )->where('municipio_id',$id )
        ->get();
        return $municipios ;

    } 
    public function index()
    { 
        $responsables = municipio::join('zonamunicipios' , 'zonamunicipios.zona_id', '=', 'municipios.zonaMunicipio')
        ->select('municipio_id', 'nombreMunicipio', 'nombreZona')
        ->get();
        $output = '';
        foreach($responsables as $row)
        {
        $output .= '<tr>
                            <td>'.$row->municipio_id.'</td>
                            <td>'.$row->nombreMunicipio.'</td>
                            <td>'.$row->nombreZona.'</td> 
                            <td><button class="btn blue waves-effect waves-light editMunicipio" id="'.$row->municipio_id.'" type="submit" name="action">
                            <i class="material-icons">create</i>
                            </button>  <button class="btn red waves-effect waves-light delete" id="'.$row->municipio_id.'" type="submit" name="action">
                            <i class="material-icons">delete</i>
                            </button></td>
                            </tr>';
        }
        echo $output;
    }
 
    public function create(Request $req)
    {         
            $txtnombre =  $req->input('txtNomMunicipio');
            $slczona =  $req->input('slcZonaMunicipio');
         
            $data = array ('nombreMunicipio'=>$txtnombre,'zonaMunicipio'=>$slczona);
            DB::table('municipios')->insert($data);
          return response()->json(['success' => 'Municipio agregado correctamente'],200); 
    }
    public function slcZonas()
    {          
           $zonas = zona::select('zona_id', 'nombreZona'  )->get();
            return   $zonas;
   
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $txtnombre =  $req->input('txtNomMunicipio');
        $slczona =  $req->input('slcZonaMunicipio');
        $id =  $req->input('id');
     
        $data = array ('municipio_id'=>$id,'nombreMunicipio'=>$txtnombre,'zonaMunicipio'=>$slczona);
        // DB::table('municipios')->update($data)->where("id",$id); 
        DB::table('municipios')
            ->where("municipio_id",$id)
            ->update($data); 
            return response()->json(['success' => 'Municipio agregado correctamente'],200); 
       
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(municipio $municipio)
    {
        //
    }
}
