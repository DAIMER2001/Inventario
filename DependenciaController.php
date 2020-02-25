<?php

namespace App\Http\Controllers;

use App\dependencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class DependenciaController extends Controller
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
            $data = DB::table('dependencias')
            ->get();
            $output = '';
            $contador = 0;
            foreach($data as $row)
            {
                $contador = $contador + 1;
                $output .= '<tr>
                    <td>'.$contador.'</td>
                    <td>'.$row->nombreDependencia.'</td>
                    <td><button class="btn waves-effect waves-light edtDependencia" id="'.$row->idDependencia.'">
                            <i class="material-icons">edit</i>
                        </button>
                        <button class="btn waves-effect waves-light red dltDependencia" id="'.$row->idDependencia.'">
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {         
        
        $txtnombre =  $req->input('txtNomDependencia');
        
        DB::beginTransaction();
        
        try {
         
            $data = array ('nombreDependencia'=>$txtnombre);

            DB::table('dependencias')->insert($data);
            
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
     * @param  \App\dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function show(dependencia $dependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        /*$responsables = municipio::join*/
        $idDependencia = $request->get('idDependencia');
        DB::beginTransaction();
        
        try {
            $municipios = DB::table('dependencias')
                            ->select('nombreDependencia')
                            ->where('idDependencia', $idDependencia)
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
     * @param  \App\dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dependencia $dependencia)
    {
        $idDependencia = $request->get('idDependencia');
        $txtnombre = $request->get('txtNomDependencia');
        DB::beginTransaction();
        
        try {
            
            DB::table('dependencias')
              ->where('idDependencia', $idDependencia)
              ->update(['nombreDependencia' => $txtnombre]);
            
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
     * @param  \App\dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idDependencia = $request->get('idDependencia');
        
        DB::beginTransaction();
        
        try {
            
            DB::table('dependencias')
                ->where('idDependencia', $idDependencia)
                ->delete();
            
            DB::commit(); 
            echo 'exito';
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
        
    }
}
