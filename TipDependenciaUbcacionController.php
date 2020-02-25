<?php

namespace App\Http\Controllers;

use App\TipDependenciaUbcacion;
use Illuminate\Http\Request;

class TipDependenciaUbcacionController extends Controller
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
    
    public function slcDependUbcion(Request $req)
    {          
            $sede = $req->get('slcsedeubcion');  
            $dependubcion = TipDependenciaUbcacion::where('sedeubc_id', $sede)
            ->select('dependubc_id', 'nombredepend' )->get();
            return   $dependubcion; 
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
     * @param  \App\TipDependenciaUbcacion  $tipDependenciaUbcacion
     * @return \Illuminate\Http\Response
     */
    public function show(TipDependenciaUbcacion $tipDependenciaUbcacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipDependenciaUbcacion  $tipDependenciaUbcacion
     * @return \Illuminate\Http\Response
     */
    public function edit(TipDependenciaUbcacion $tipDependenciaUbcacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipDependenciaUbcacion  $tipDependenciaUbcacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipDependenciaUbcacion $tipDependenciaUbcacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipDependenciaUbcacion  $tipDependenciaUbcacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipDependenciaUbcacion $tipDependenciaUbcacion)
    {
        //
    }
}
