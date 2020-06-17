<?php

namespace App\Http\Controllers;

use App\product_categorie;
use Illuminate\Http\Request;

class ProductCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_productcategorie = product_categorie::get();
        return view ('product_categorie/productcategorie', compact('all_productcategorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('product_categorie/tambahproductcategorie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pn = new product_categorie();
        $pn->id = $request->id;
        $pn->category_name = $request->category_name;
        $pn->save();
        return redirect()->route('allProductCategorie')->with('status', 'Product Categorie Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function show(product_categorie $product_categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(product_categorie $product_categorie)
    {
         return view('product_categorie/editproductcategorie',compact('product_categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_categorie $product_categorie)
    {
        $product_categorie->category_name = $request->category_name;
        $product_categorie->save();
        return redirect()->route('allProductCategorie')->with('status', 'Product Categorie Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product_categorie  $product_categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_categorie $product_categorie)
    {
        $product_categorie->delete();
        return redirect()->route('allProductCategorie')->with('status', 'Product Categorie Berhasil Dihapus');
    }
}
