<?php

namespace App\Http\Controllers;

use App\TipSedeUbcacion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipSedeUbcacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function slcSedeUbcion(Request $req)
    {          
        $municipio = $req ->input('slcmunicipioubcion');
           try { 
            $sedeubcion = TipSedeUbcacion::where('municipioSede', $municipio)
            ->select('id', 'nombreSede'  )->get(); 
            return   $sedeubcion; 
     } catch (QueryException $ex) {
            dd($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 200);
     }
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\TipSedeUbcacion  $tipSedeUbcacion
     * @return \Illuminate\Http\Response
     */
    public function show(TipSedeUbcacion $tipSedeUbcacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipSedeUbcacion  $tipSedeUbcacion
     * @return \Illuminate\Http\Response
     */
    public function edit(TipSedeUbcacion $tipSedeUbcacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipSedeUbcacion  $tipSedeUbcacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipSedeUbcacion $tipSedeUbcacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipSedeUbcacion  $tipSedeUbcacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipSedeUbcacion $tipSedeUbcacion)
    {
        //
    }
}
