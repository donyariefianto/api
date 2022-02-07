<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
class ApiPromo extends Controller
{
    public function index(){
        $promo = Promo::all(); 
        return response()->json($promo);
    }
    public function show($id){
        $promo = Promo::find($id); 
        return response()->json($promo);
    }
}
