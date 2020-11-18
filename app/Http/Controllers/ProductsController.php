<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::get();
        return $product;
    }

    public function show($id)
    {
        return Products::find($id);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */     
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'picture' => 'required',

        ]);
        $product = new Products();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->picture = $request->picture;
        $product->save();
        return $request;
    }

    
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());

        return $product;
    }

    public function delete(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return "hadchi rah tm7a kon hani";
    }

     
}
