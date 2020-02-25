<?php

namespace App\Http\Controllers;

use App\TipModeloEquipo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipModeloEquipoController extends Controller
{
       //SELECT
       public function slc()
       {
              $modelo = TipModeloEquipo::select('modeloId as id', 'nombreModelo as nombre')->get();
              return   $modelo;
       }
       //CREAR MODELO 
       public function create(Request $req)
       {
              $nombremodelo = $req->get('txtnombremodelo');
              $data = array(
                     'nombreModelo'  =>  "NO APLICA"
              );
              try {    
                     $modelo = TipModeloEquipo::all();
                     $last = $modelo->last();
                     $lastid =   $last["modeloId"];
                     $tipoModelo = TipModeloEquipo::where("modeloId", "=", $lastid)->update(array('nombreModelo' => $nombremodelo));    
                     TipModeloEquipo::insert($data); 
                  return response()->json(['success' => 'Modelo agregado correctamente'], 200); 
              } catch (QueryException $ex) {
                  dd($ex->getMessage());
                  return response()->json(['error' => $ex->getMessage()], 200);
              }
              
       }
       //EDITAR MODELO
       public function edit(Request $req)
       {
              $nombremodelo = $req->get('txtnombremodelo');
              $lastid =   $req->get('id');
              try {
                     $tipoModelo = TipModeloEquipo::where("modeloId", "=", $lastid)->update(array('nombreModelo' => $nombremodelo));
                     return response()->json(['success' => 'tipo modelo editado correctamente =>'.$tipoModelo], 200);
              } catch (QueryException $ex) {
                     dd($ex->getMessage());
                     return response()->json(['error' => $ex->getMessage()], 200);
              }
       }

       //ELIMINAR
       public function delete(Request $req)
       {
              $lastid =   $req->get('iddelete');
              $deletedRows = TipModeloEquipo::where('modeloId', $lastid)->delete();
              return response()->json(['success' => 'Tipo Modelo eliminado correctamente'], 200);
       }
}
