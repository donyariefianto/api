<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ApiProduct extends Controller
{
    public function index(){
        $products = Products::all(); 
        return response()->json(['message' =>'Success','data' => $products]);
    }
    public function show($id){
        $product = Products::find($id); 
        return response()->json(['message' =>'Success','data' => $product]);
    }
    public function store(Request $request){
        $product = Products::create($request->all()); 
        return response()->json(['message' =>'Success Inserted','data' => $product]);
    }
    public function update(Request $request,$id){
        $product = Products::find($id); 
        $product->update($request->all()); 
        return response()->json(['message' =>'Success','data' => $product]);
    }
    public function destroy($id){
        $product = Products::find($id); 
        $product->delete(); 
        return response()->json(['message' =>'Success Deleted','data' => null]);
    }
}
