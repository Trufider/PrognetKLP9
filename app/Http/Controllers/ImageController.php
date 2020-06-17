<?php

namespace App\Http\Controllers;

use App\product_image;
use App\product;
use Illuminate\Http\Request;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $products=product::all()->sortByDesc('id');
         $all_product_image=product_image::get()->sortByDesc('id');
         return view('product_image/imageuser',compact('all_product_image','products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
                
            
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
  




    public function show(product_image $product_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function edit(product_image $product_image)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_image $product_image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_image $product_image)
    {
       
    }
}
