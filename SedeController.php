<?php

namespace App\Http\Controllers;

use App\sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$value = $request->get('value');
        return $value;*/
        
     $data = DB::table('municipios')
       ->get();
     $output = '<option value="">Municipio</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->municipio_id.'">'.$row->nombreMunicipio.'</option>';
     }
     echo $output;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {         
            $txtnombre =  $req->input('txtNomSede');
            $txtdireccion =  $req->input('txtDirecSede');
            $slcmunicipio =  $req->input('slcMunicSede');
         
            $data = array ('nombreSede'=>$txtnombre,'direccionSede'=>$txtdireccion,'municipioSede'=>$slcmunicipio);

            DB::table('sedes')->insert($data);
          return response()->json(['success' => 'Sede agregada correctamente'],200); 
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
     * @param  \App\sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(sede $sede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function edit(sede $sede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sede $sede)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function destroy(sede $sede)
    {
        //
    }
}
