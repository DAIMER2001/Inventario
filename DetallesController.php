<?php

namespace App\Http\Controllers;

use App\detalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class DetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {         
            $txtnombre =  $req->input('txtNomDetalle');
            $txtdescripcion =  $req->input('txtDescripDetalle');
         
            $data = array ('nombreDetalle'=>$txtnombre,'desccionDetalle'=>$txtdescripcion);

            DB::table('detalles')->insert($data);
          return response()->json(['success' => 'Detalle agregado correctamente'],200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = new detalles;
        $detalle -> txtNombreDetalle = $request -> nombreDetalle;
        $detalle -> slcMaestDetalle = $request -> maestDetalle;
        $detalle -> txtDescripDetalle = $request -> desccionDetalle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function show(detalles $detalles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function edit(detalles $detalles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detalles $detalles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalles $detalles)
    {
        //
    }
}
