<?php

namespace App\Http\Controllers;

use App\mantenimiento;
use App\tecnico;
use App\usuario;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  DB;
use Exception;

class SoporteController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            return view('soporte');
        }

    }

    /**
     * Show the usuario
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getUsuario()
    {
        try{
            $usuario = usuario::select(
                'persona.cedulaPer as cedulaUsu',
                'persona.apellidoPer as apellidoUsu',
                'persona.nombrePer as nombreUsu',
                'usuario.usuId as usuarioId'
            )
            ->join('persona' ,'persona.personaId', '=', 'usuario.personaId'  )
            ->where('persona.activoPer', '=', '0')
            ->get();

            $tecnico = tecnico::select(
                'persona.cedulaPer as cedulaTec',
                'persona.apellidoPer as apellidoTec', //
                'persona.nombrePer as nombreTec',
                'tecnico.tecnicoId as tecnicoId'
            )
            ->join('persona' ,'persona.personaId', '=', 'tecnico.personaId'  )
            ->where('persona.activoPer', '=', '0')
            ->get();


            // convert
            // $array = array_combine( (array)$tecnico, (array)$usuario);
            // $array = array_merge((array)$tecnico, (array)$usuario);
            $data = array_merge(['tecnico'=>$tecnico->toArray()], ['usuario' => $usuario->toArray()]);
            return $data;
            // return  response()->json([  "usuario=>".(array)$arrayusu."tecnico=>".(array)$array ], 200);
        }   catch (Exception $ex) {
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
        }

    }
//     Perfilando [Editar en línea] [ Editar ] [ Explicar SQL ] [ Crear código PHP ] [ Actualizar]
// mantId	tipoMantId	usuMantId	tecnicoMantId	observacionMant	activoMant
    public function getMantenimiento()
    {
        try{

            $usuario = mantenimiento::select(
                'mantenimiento.cedulaPer as cedula',
                'mantenimiento.apellidoPer as apellido', //
                'mantenimiento.nombrePer as nombre',
                'mantenimiento.observacionMant as observacion'
            )
            ->join('mantenimiento.tipoMantId', '=', 'usuario.tipoMantId'  )
            ->join('mantenimiento.usuMantId', '=', 'usuario.tipoMantId'  )
            ->join('mantenimiento.tecnicoMantId', '=', 'usuario.tipoMantId'  )
            ->join('mantenimiento.observacionMant', '=', 'usuario.tipoMantId'  )
            ->join('mantenimiento.tipoMantId', '=', 'usuario.tipoMantId'  )
            ->where('mantenimiento.activoMant', '=', '0')
            ->get();

            return  $usuario ;
        }   catch (QueryException $ex) {
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req) {
        DB::beginTransaction();
        try{

            $TipoMant = $req->slctipomant;
            $usuman = $req->slcusuman;
            $tecnicoman = $req->slctecnicoman;
            $observman = $req->txtobservman;
            $messages = [
                'required' => 'el: campo es obligatorio'
            ];
            $Validator = Validator::make(
                $req->all(),
                [
                    "tipoMantId" => 'required|numeric',
                    "usuMantId" => 'required|numeric',
                    "tecnicoMantId" => 'required|numeric',
                    "observacionMant" => 'required|string',
                ],
                $messages
            );
            if ($Validator->fails()) {
                $Response = $Validator->messages();
                return response()->json(['success' => $Response], 200);
            } else {
                    $datomantenimiento = array(
                        "tipoMantId" => $TipoMant,
                        "usuMantId" => $usuman,
                        "tecnicoMantId" => $tecnicoman,
                        "observacionMant" => $observman
                    );
                    mantenimiento::insert( $datomantenimiento);
                }
        }catch (QueryException $ex) {
            DB::rollback();

            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //mantId
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
