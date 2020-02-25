<?php

namespace App\Http\Controllers;

use App\responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Database\QueryException;

class ResponsableController extends Controller
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
            $data = DB::table('responsable')
                        ->join('sedes', 'idSede', '=', 'sedeRespons')
                        ->join('dependencias', 'idDependencia', '=', 'dependRespons')
                        ->select('idRespons', 'nombreRespons', 'apellidoRespons', 'emailRespons', 'nombreSede', 'nombreDependencia')
                        ->get();
            $output = '';
            $contador = 0;
            foreach($data as $row)
            {
                $contador = $contador + 1;
                $output .= '<tr>
                <td>'.$contador.'</td>
                <td>'.$row->nombreRespons.'</td>
                <td>'.$row->apellidoRespons.'</td>
                <td>'.$row->emailRespons.'</td>
                <td>'.$row->nombreSede.'</td>
                <td>'.$row->nombreDependencia.'</td>
                <td><button class="btn waves-effect waves-light edtResponsable" type="submit" id="'.$row->idRespons.'">
                <i class="material-icons">edit</i>
                </button>  
                <button class="btn waves-effect waves-light red dltResponsable" type="submit" id="'.$row->idRespons.'">
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
            $txtnombre =  $req->input('txtNomResponsable');
            $txtapellidon =  $req->input('txtApellResponsable');
            $mailcorreo =  $req->input('mailResponsable');
            $slcsede =  $req->input('slcSedeResponsable');
            $slcdependencia =  $req->input('slcDepenResponsable');
         
            
        DB::beginTransaction();

        try {

            $data = array ('nombreRespons'=>$txtnombre,'apellidoRespons'=>$txtapellidon,'emailRespons'=>$mailcorreo,'sedeRespons'=>$slcsede,'dependRespons'=>$slcdependencia);

            DB::table('responsable')->insert($data);
            
            DB::commit();
            echo 'exito';
        } catch (\Exception $e) {

            DB::rollback(); 

        } 
    }
    
    public function sedeSlc()
    {
        
        DB::beginTransaction();

        try {
        
     $data = DB::table('sedes')
       ->get();
     $output = '<option value="" disabled selected>Sede</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->idSede.'">'.$row->nombreSede.'</option>';
     }
        DB::commit();
     echo $output;
        } catch (\Exception $e) {

            DB::rollback(); 

        }
        
        
    }
    
    public function dependenciaSlc()
    {
        
        DB::beginTransaction();

        try {
        
     $data = DB::table('dependencias')
       ->get();
     $output = '<option value="" disabled selected>Dependencia</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->idDependencia.'">'.$row->nombreDependencia.'</option>';
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
     * @param  \App\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(responsable $responsable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $idResponsable = $request->get('idResponsable');
        
        DB::beginTransaction();
        try {
            $responsable = DB::table('responsable')
                            ->join('sedes', 'idSede', '=', 'sedeRespons')
                            ->join('dependencias', 'dependRespons', '=', 'idDependencia')
                            ->select('nombreRespons', 'apellidoRespons', 'emailRespons', 'idSede', 'idDependencia')
                            ->where('idRespons', $idResponsable)
                            ->get();
            DB::commit();
            return $responsable;
            
        } catch (\Exception $e) {
            DB::rollback(); 
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, responsable $responsable)
    {
        $idResponsable = $request->get('idResponsable');
        $txtnombre = $request->get('txtNomResponsable');
        $txtapellido = $request->get('txtApellResponsable');
        $txtemail = $request->get('mailResponsable');
        $slcsede = $request->get('slcSedeResponsable');
        $slcdependencia = $request->get('slcDepenResponsable');
        DB::beginTransaction();
        
        try {
            
            DB::table('responsable')
              ->where('idRespons', $idResponsable)
              ->update(['nombreRespons' => $txtnombre, 'apellidoRespons' => $txtapellido, 'emailRespons' => $txtemail, 'sedeRespons' => $slcsede, 'dependRespons' => $slcdependencia]);
            
            DB::commit();
            
            return 'exito' ;
            
        } catch (\Exception $e) {
            echo "error";
            DB::rollback(); 
            
        }
    }
    public function equiporespons(Request $req)
    {   
        // $responsable = responsable::select('emailRespons');
        // echo $responsable->emailRespons;
        // return response()->json($responsable,200); 
        // $responsable = ResponsableModel::select('emailRespons')->where('emailRespons = ',$txtcorreo) ;
        // echo $responsable; 
        try{
            
        $responid = $req->get('id'); 
        $responsable = responsable::select('responsId as id', 'emailRespons as email')
                                    ->join('sedes', 'idSede', '=', 'sedeRespons')
                                    ->where('emailRespons', 'LIKE', '%'. $search. '%')
                                    ->get();
        
            return response()->json($responsable );
        }catch (QueryException $ex  ){
            
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
   
        }
        
    }
    public function emailrespons(Request $req)
    {   
        // $responsable = responsable::select('emailRespons');
        // echo $responsable->emailRespons;
        // return response()->json($responsable,200); 
        // $responsable = ResponsableModel::select('emailRespons')->where('emailRespons = ',$txtcorreo) ;
        // echo $responsable; 
        $search = $req->get('txtcorreo'); 
        $responsable = responsable::select('responsId as id', 'emailRespons as email')
                                    ->where('emailRespons', 'LIKE', '%'. $search. '%')
                                    ->get();
        
            return response()->json($responsable );
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idResponsable = $request->get('idResponsable');
        
        DB::beginTransaction();
        
        try {
            
            DB::table('responsable')
                ->where('idResponsable', $idResponsable)
                ->delete();
            
            DB::commit(); 
            echo 'exito';
            
        } catch (\Exception $e) {
            
            DB::rollback(); 
            
        }
    }
}
