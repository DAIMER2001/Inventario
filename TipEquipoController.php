<?php

namespace App\Http\Controllers;

use App\TipEquipo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipEquipoController extends Controller
{
    //SELECT
    public function slc()
    {
        $tipospc = TipEquipo::select('tipoId as id', 'nombreTipo as nombre')->get();
        return   $tipospc;
    }
    //CREAR    
    public function create(Request $req)
    {
        $nombretipeqipo = $req->get('txtnombretipequipo');
        $data = array(
            'nombreTipo'  =>  $nombretipeqipo
        );
        try {
            TipEquipo::insert($data); 
            return response()->json(['success' => 'Tipo pc agregado correctamente'], 200);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
        }
    }
    //EDITAR
    public function edit(Request $req)
    {
        $nombretipeqipo = $req->get('txtnombretipequipo');
        $lastid =   $req->get('id');
        try {
            $tipoEntrada = TipEquipo::where("tipoId", "=", $lastid)->update(array('nombreTipo' => $nombretipeqipo));
            return response()->json(['success' => 'tipo equipo editado correctamente'], 200);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
        }
    }
    //ELIMINAR
    public function delete(Request $req)
    {
        $lastid =   $req->get('iddelete');
        $deletedRows = TipEquipo::where('tipoId', $lastid)->delete();
        return response()->json(['success' => 'Tipo pc eliminado correctamente'], 200);
    }
}
