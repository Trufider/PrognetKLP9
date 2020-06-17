<?php

namespace App\Http\Controllers;

use App\product_image;
use App\product;
use Illuminate\Http\Request;
use db_paktikum_prognet; //ditambahkan tgl 17 mei 2020 ini bisa dihapus

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_productimage = product_image::get();
        return view('product_image/productimage', compact('all_productimage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=product::all();
        return view('product_image/tambahproductimage',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       /* request()->validate([
            'image_name' =>'required|image|mimes:jpge,png,jpg,gif,svg|max:2048',
        ]);*/

        if($files = $request->file('image_name')){
            $destinationPath = public_path('/product_image/');
            $image_name = date('YmdHis'). "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image_name);
            $insert['image'] = "$image_name";

            $pn = new product_image();
            $pn->id = $request->id;
            $pn->product_id = $request->product_id;
            $pn->image_name = $image_name;
            $pn->save();
        }

         
      
     /*if($request->hasFile('image_name')){
      $resorce       = $request->file('image_name');
      $name   = $resorce->getClientOriginalName();
      $resorce->move(\base_path() ."/public/images", $name);
      $save = db_paktikum_prognet::table('product_images')->insert(['image_name' => $name]);
      echo "Gambar berhasil di upload";

      $pn = new product_image();
      $pn->id = $request->id;
      $pn->product_id = $request->product_id;
      $pn->image_name=$name;
      $pn->save(); 


        }

        else{
            echo "Gagal upload gambar";
     }

       

       /*$pn = new product_image();
       $pn->id = $request->id;
       $pn->product_id = $request->product_id;
       $file = $request->file('image_name');
       $ext = $file->getClientOriginalExtension();
       $newName = rand(100000,1001238912).".".$ext;
       $file->move('uploads/file',$newName);
       $pn->image_name=$newName;
       $pn->save();*/



       // berhasil upload, $request->image_name->store('public');

                                                                      /* $request->image_name->store('public');

                                                                        //   comenct 17 mei 2020        
                                                                        $pn = new product_image();
                                                                        $pn->id = $request->id;
                                                                        $pn->product_id = $request->product_id;
                                                                        $pn->image_name = $request->image_name;
                                                                        $pn->save();*/


        

        /*$image_name = $request->file('image_name')->store('nama'); 




        product_image->product()->create([
        'product_id' = 
        'product_image' => $image_name
        ]);*/

        /*product_image::create([
            'id' => $request->id,
            'product_id' => $request->product_id,
            'image_name' => $request->$image_name
        ]);*/

       /*  $product_image = product_image::create([
            'id' => $request->id,
            'product_id' => $request->product_id,
            'product_image' => $request->product_image,
            
        ]);

        $request->hasFile('image_name'){
          ($request->image_name = $product_image){
                $product_image = $product_image->store('image_name');*/
                
            
        return redirect()->route('allProductImage')->with('status', 'Product Image Berhasil Ditambahkan');
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
        $products=product::all();
        return view('product_image/editproductimage',compact('product_image','products'));
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
        $product_image->delete();

        return redirect()->route('allProductImage')->with('status', 'Product Image Berhasil Dihapus');
    }
}
