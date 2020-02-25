<?php

namespace App\Http\Controllers;

use App\zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class ZonaController extends Controller
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

            $data = DB::table('zonas')
                ->get();
            $output = '';
            $contador = 0;
            foreach($data as $row)
            {
                $contador = $contador + 1;
                $output .= '<tr>
                    <td>'.$contador.'</td>
                    <td>'.$row->nombreZona.'</td>
                    <td><button class="btn waves-effect waves-light edtZona" type="submit" id="'.$row->idZona.'">
                            <i class="material-icons">edit</i>
                        </button>  
                        <button class="btn waves-effect waves-light red dltZona" type="submit" id="'.$row->idZona.'">
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
    public function  create(Request $req)
    {         
        $txtnombre =  $req->input('txtNomZona');
        DB::beginTransaction();

        try {

            $data = array ('nombreZona'=>$txtnombre);

            DB::table('zonas')->insert($data);
            
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
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(zona $zona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $idZona = $request->get('idZona');
        DB::beginTransaction();
        
        try {
            $zona = DB::table('zonas')
                            ->select('nombreZona')
                            ->where('idZona', $idZona)
                            ->get();
            DB::commit();
            return $zona ;
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, zona $zona)
    {
        $idZona = $request->get('idZona');
        $txtnombre = $request->get('txtNomZona');
        DB::beginTransaction();
        
        try {
            
            DB::table('zonas')
              ->where('idZona', $idZona)
              ->update(['nombreZona' => $txtnombre]);
            
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
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idZona = $request->get('idZona');
        
        DB::beginTransaction();
        
        try {
            
            DB::table('zonas')
                ->where('idZona', $idZona)
                ->delete();
            
            DB::commit(); 
            echo 'exito';
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
    }
}
