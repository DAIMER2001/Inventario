<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Market\Models\Product\Product;
use Market\Http\Request;
class BarcondeController extends Controller
{
    public function index()
    {
         $producto = Product::all(["name", "price"]);
            return view('codebar')->with('producto', $producto);
    }
   
    
    //
}
