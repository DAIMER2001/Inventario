<?php

namespace App\Http\Controllers;

use App\tipTarjtaExpn;
use Illuminate\Http\Request;

class TipTarjtaExpnController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTipTrjta(Request $request)
    {
       
     //CREAR TIP EQUIPO   
         $nombretiptarjta = $request->get('txtnombretiptarjeta'); 
         $data = array(
                 'nombretarjeta'  =>  $nombretiptarjta  
                );   
         tipTarjtaExpn::insert($data); 
                 return response()->json(['success' => 'Tipo TARJETA agregado correctamente'],200);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editTipTrjta(Request $request)
    {
       
        $nombretiptarjta = $request->get('txtnombretiptarjeta'); 
        $lastid =   $request->get('id');   
        $data = array(
                'nombretarjeta'  =>  $nombretiptarjta  
               );  
               tipTarjtaExpn::where("tipotarjetae_id",$lastid)
        ->update($data);   
       return response()->json(['success' => 'Tipo pc editado correctamente'],200);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteTipTrjta(Request $request)
    {
      
        $lastid =   $request->get('agregareditartarjta');   
        $deletedRows = tipTarjtaExpn::where('tipotarjetae_id', $lastid)->delete();
       return response()->json(['success' => 'Tipo pc eliminado correctamente'],200);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipTarjtaExpn  $tipTarjtaExpn
     * @return \Illuminate\Http\Response
     */
    public function show(tipTarjtaExpn $tipTarjtaExpn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipTarjtaExpn  $tipTarjtaExpn
     * @return \Illuminate\Http\Response
     */
    public function edit(tipTarjtaExpn $tipTarjtaExpn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipTarjtaExpn  $tipTarjtaExpn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipTarjtaExpn $tipTarjtaExpn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipTarjtaExpn  $tipTarjtaExpn
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipTarjtaExpn $tipTarjtaExpn)
    {
        //
    }
}
