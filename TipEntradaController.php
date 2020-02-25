<?php

namespace App\Http\Controllers;

use App\TipEntrada;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipEntradaController extends Controller
{ 
    //SELEC
    public function slc()
    {          
           $tcladomtipoentrada = TipEntrada::select('entradaId', 'nombreEnt'  )->get();
            return   $tcladomtipoentrada;
         
    } 
    //CREAR  
    public function create(Request $req)
    {
        $nombremarca = $req->get('txtnombretipentrada');
        $data = array(
            'nombreEnt'  =>  $nombremarca
        );
        try {   
            TipEntrada::insert($data); 
            // $tipoEntrada =  TipEntrada::create([ 'nombreEnt'  =>  $nombremarca]);
            return response()->json(['success' => 'Marca agregado correctamente'], 200);
             
        } catch (QueryException $ex) {
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
        }
    }
    //EDITAR
    public function edit(Request $req)
    {
        $nombreentrada = $req->get('txtnombretipentrada');
        $lastid =   $req->get('id');
        try {
            $tipoEntrada = TipEntrada::where("entradaId", "=", $lastid)->update(array('nombreEnt' => $nombreentrada));
            return response()->json(['success' => 'tipo entrada editado correctamente'], 200);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
        }
    } 
    //ELIMINAR
    public function delete(Request $req){  
        $lastid =   $req->get('iddelete');    
        $deletedRows = TipEntrada::where('entradaId', $lastid)->delete();
       return response()->json(['success' => 'Tipo pc eliminado correctamente'],200);   
    } 


}
