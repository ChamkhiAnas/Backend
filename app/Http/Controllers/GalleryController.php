<?php

namespace App\Http\Controllers;
use App\Models\Gallery;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::get();
        return $gallery;
    }

    public function show($id)
    {
        return Gallery::find($id);
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
            'picture' => 'required',
        ]);
        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->picture = $request->picture;
        $gallery->save();
        return $request;
    }

    
    
    
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return $gallery;
    }

    public function delete(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return "Dackhi rah tm7a kon hani";
    }

     
}
