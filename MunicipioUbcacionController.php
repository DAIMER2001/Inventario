<?php

namespace App\Http\Controllers;

use App\MunicipioUbcacion;
use App\ubicacion_zona;
use Illuminate\Http\Request;

class MunicipioUbcacionController extends Controller
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

    //FORM UBICACION
    public function slcMunicipioUbcion()
    {          
           $zonaubcion = ubicacion_zona::select('municipio_id', 'nombreMunicipio'  )->get();
            return   $zonaubcion; 
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
     * @param  \App\MunicipioUbcacion  $municipioUbcacion
     * @return \Illuminate\Http\Response
     */
    public function show(MunicipioUbcacion $municipioUbcacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MunicipioUbcacion  $municipioUbcacion
     * @return \Illuminate\Http\Response
     */
    public function edit(MunicipioUbcacion $municipioUbcacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MunicipioUbcacion  $municipioUbcacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MunicipioUbcacion $municipioUbcacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MunicipioUbcacion  $municipioUbcacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(MunicipioUbcacion $municipioUbcacion)
    {
        //
    }
}
