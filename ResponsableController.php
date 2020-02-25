<?php

namespace App\Http\Controllers;

use App\marcas;
use App\responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\QueryException;
use DB;

class ResponsableController extends Controller
{ 
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    public function create(Request $req)
    {    
        $messages = [

            'required' => 'el :campo es obligatorio'

        ];  
        $Validator = Validator::make(
            $req ->all(),
            [
                'txtcorreo' => 'required|email',
                'txtnombre' => 'required|string',
                'slcsede' => 'required|numeric',
                'slcdependencia' => 'required|numeric',
            ],
            $messages
        ); 
        if($Validator->fails()){
            $Response = $Validator->messages();
        }else{ 
            $txtcorreo =  $req->input('txtcorreo');
            $txtnombre =  $req->input('txtnombre');
            $slcsede =  $req->input('slcsede');
            $slcdependencia =  $req->input('slcdependencia');
            $data = array ('nombreRespons'=>$txtnombre ,'emailRespons'=>$txtcorreo,'slcsede'=>$slcsede,'slcdependencia'=>$slcdependencia);
            DB::table('responsables')->insert($data);  
            try {  
                return response()->json(['success' => 'Responsable agregado correctamente'],200);
            } catch(QueryException $ex){ 
                    dd($ex->getMessage()); 
            }
        }
                
    }
    //VALIDAR CORREO INGRESADO 
    public function emaildata(Request $req){
        $txtcorreo = $req->input('txtcorreo'); 
        $responsables = DB::table('responsables')->where('emailRespons',  '=',   $txtcorreo)->get();
    
        // echo $responsables->emailRespons;
        return response()->json($responsables,200); 
        // $responsables = ResponsableModel::select('emailRespons')->where('emailRespons = ',$txtcorreo) ;
        // echo $responsables;
    }

    public function emailrespons(Request $req)
    {   
        // $responsables = responsable::select('emailRespons');
        // echo $responsables->emailRespons;
        // return response()->json($responsables,200); 
        // $responsables = ResponsableModel::select('emailRespons')->where('emailRespons = ',$txtcorreo) ;
        // echo $responsables; 
        $search = $req->get('txtcorreo'); 
        $responsables = responsable::select('id', 'emailRespons')
                                    ->where('emailRespons', 'LIKE', '%'. $search. '%')
                                    ->get();
        
            return response()->json($responsables );
        
    }
}
