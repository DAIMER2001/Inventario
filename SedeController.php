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
        DB::beginTransaction();

        try {

            $data = DB::table('sedes')
                    ->join('municipios', 'idMunicipio', '=', 'municipioSede')
                    ->select('idSede', 'nombreSede', 'direccionSede', 'nombreMunicipio')
                    ->get();
            $output = '';
            $contador = 0;
            foreach($data as $row)
            {
                $contador = $contador + 1;
                $output .= '<tr>
                <td>'.$contador.'</td>
                <td>'.$row->nombreSede.'</td>
                <td>'.$row->direccionSede.'</td>
                <td>'.$row->nombreMunicipio.'</td>
                <td><button class="btn waves-effect waves-light edtSede" type="submit" id="'.$row->idSede.'">
                <i class="material-icons">edit</i>
                </button>  
                <button class="btn waves-effect waves-light red dltSede" type="submit" id="'.$row->idSede.'">
                <i class="material-icons">delete</i>
                </button>
                </td>
                </tr>';
            }
            DB::commit();
            echo $output;
        } catch (\Exception $e) {

            DB::rollback(); 

        }
    }

    public function sedeSlc()
    {
        DB::beginTransaction();

        try {   
            $data = DB::table('municipios')
                ->get();
            $output = '<option value="" disabled selected>Municipio</option>';
            foreach($data as $row)
            {
            $output .= '<option value="'.$row->idMunicipio.'">'.$row->nombreMunicipio.'</option>';
            }
            DB::commit();
            echo $output;
        } catch (\Exception $e) {

            DB::rollback(); 

        }
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
            DB::beginTransaction();

            try {
                $data = array ('nombreSede'=>$txtnombre,'direccionSede'=>$txtdireccion,'municipioSede'=>$slcmunicipio);

                DB::table('sedes')->insert($data);
                
                DB::commit();
                echo 'exito';
                
                
            } catch (\Exception $e) {

                DB::rollback(); 

            }
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
    public function edit(Request $request)
    {
        $idSede = $request->get('idSede');
        DB::beginTransaction();
        try {
            $sedes = DB::table('sedes')
                            ->join('municipios', 'idMunicipio', '=', 'municipioSede')
                            ->select('nombreSede', 'direccionSede', 'idMunicipio')
                            ->where('idSede', $idSede)
                            ->get();
            DB::commit();
            return $sedes ;
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
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
        $idSede = $request->get('idSede');
        $txtnombre = $request->get('txtNomSede');
        $txtdireccion = $request->get('txtDirecSede');
        $slcsedemunicipio = $request->get('slcMunicSede');
        DB::beginTransaction();
        
        try {
            
            DB::table('sedes')
              ->where('idSede', $idSede)
              ->update(['nombreSede' => $txtnombre, 'direccionSede' => $txtdireccion, 'municipioSede' => $slcsedemunicipio]);
            
            DB::commit();
            
            return 'exito' ;
            
        } catch (\Exception $e) {
            echo "error";
            DB::rollback(); 
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idSede = $request->get('idSede');
        
        DB::beginTransaction();
        
        try {
            
            DB::table('sedes')
                ->where('idSede', $idSede)
                ->delete();
            
            DB::commit(); 
            echo 'exito';
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
    }
}
