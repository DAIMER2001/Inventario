<?php

namespace App\Http\Controllers;

use App\municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class MunicipioController extends Controller
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
            $data = DB::table('municipios')
                ->join('zonas', 'idZona', '=', 'zonaMunicipio')
                ->select('idMunicipio', 'nombreMunicipio', 'nombreZona')
                ->get();
            $output = '';
            $contador = 0;
            foreach($data as $row)
            {
                $contador = $contador + 1;
                $output .= '<tr>
                <td>'.$contador.'</td>
                <td>'.$row->nombreMunicipio.'</td>
                <td>'.$row->nombreZona.'</td>
                <td><button class="btn waves-effect waves-light edtMunicipio" type="submit" id="'.$row->idMunicipio.'">
                <i class="material-icons">edit</i>
                </button>  
                <button class="btn waves-effect waves-light red dltMunicipio" type="submit" id="'.$row->idMunicipio.'">
                <i class="material-icons">delete</i>
                </button>
                </td>
                </tr>';
            }
            DB::commit();
            echo $output;
        } catch (\Exception $e) {

            DB::rollback(); 
            echo 'error';

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {         
            $txtnombre =  $req->input('txtNomMunicipio');
            $slczona =  $req->input('slcZonaMunicipio');
        
        DB::beginTransaction();

        try {

            $data = array ('nombreMunicipio'=>$txtnombre,'zonaMunicipio'=>$slczona);

            DB::table('municipios')->insert($data);
            
            DB::commit();
            echo 'exito';
        } catch (\Exception $e) {

            DB::rollback(); 

        } 
    }

    
    public function zonaSlc()
    {
        DB::beginTransaction();

        try {

            $data = DB::table('zonas')
            ->get();
            $output = '<option value="" disabled selected>Zona</option>';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->idZona.'">'.$row->nombreZona.'</option>';
            }
            DB::commit();
            echo $output;
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
    public function edit(Request $request)
    {
        $idMunicipio = $request->get('idMunicipio');
        DB::beginTransaction();
        
        try {
            $municipios = DB::table('municipios')
                            ->join('zonas' , 'idZona', '=', 'zonaMunicipio')
                            ->select('nombreMunicipio', 'idZona')
                            ->where('idMunicipio', $idMunicipio)
                            ->get();
            DB::commit();
            return $municipios ;
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, municipio $municipio)
    {
        $idMunicipio = $request->get('idMunicipio');
        $txtnombre = $request->get('txtNomMunicipio');
        $slczonamunicipio = $request->get('slcZonaMunicipio');
        DB::beginTransaction();
        
        try {
            
            DB::table('municipios')
              ->where('idMunicipio', $idMunicipio)
              ->update(['nombreMunicipio' => $txtnombre, 'zonaMunicipio' => $slczonamunicipio]);
            
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
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idMunicipio = $request->get('idMunicipio');
        
        DB::beginTransaction();
        
        try {
            
            DB::table('municipios')
                ->where('idMunicipio', '=', $idMunicipio)
                ->delete();
            
            DB::commit(); 
            echo 'exito';
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
    }
}