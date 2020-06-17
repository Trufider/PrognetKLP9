<?php

namespace App\Http\Controllers;

use App\product_category_detail;
use App\product;
use App\product_categorie;
use Illuminate\Http\Request;

class ProductCategoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_productcategorydetail = product_category_detail::get();
        return view ('product_category_detail/product_category_detail', compact('all_productcategorydetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=product::all();
        $product_categories=product_categorie::all();
        return view ('product_category_detail/tambahproductcategorydetail',compact('products','product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pn = new product_category_detail();
        $pn->id = $request->id;
        $pn->product_id = $request->product_id;
        $pn->product__category_id = $request->product__category_id;
        $pn->save();
        return redirect()->route('allProductCategoryDetail')->with('status', 'Product Categorie Details Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function show(product_category_detail $product_category_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(product_category_detail $product_category_detail)

    {
        $products=product::all();
        $product_categories=product_categorie::all();
         return view('product_category_detail/editproductcategorydetail',compact('product_category_detail','products','product_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_category_detail $product_category_detail)
    {
        $product_category_detail->product_id = $request->product_id;
        $product_category_detail->product__category_id = $request->product__category_id;
        $product_category_detail->save();
        return redirect()->route('allProductCategoryDetail')->with('status', 'Product Categorie Details Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_category_detail $product_category_detail)
    {
        $product_category_detail->delete();
        return redirect()->route('allProductCategoryDetail')->with('status', 'Product Categorie Details Berhasil Dihapus');
    }
}
