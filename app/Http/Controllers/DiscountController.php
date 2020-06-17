<?php

namespace App\Http\Controllers;

use App\discount;
use App\product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_discount = discount::get();
        return view('/discount/discount',compact('all_discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=product::all();
        return view('discount/tambahdiscount',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        


        request()->validate([
            'percentage' =>'required|numeric|digits_between:1,2',
        ]);

        $pn = new discount();
        $pn->id = $request->id;
        $pn->product_id = $request->product_id;
        $pn->percentage = $request->percentage;
        $pn->start = $request->start;
        $pn->end = $request->end;
        $pn->save();
        return redirect()->route('allDiscount')->with('status', 'Discount Berhasil Ditambahkan');
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(discount $discount)
    {
        $products=product::all();
        return view('discount/editdiscount',compact('discount','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discount $discount)
    {

        request()->validate([
            'percentage' =>'required|numeric|digits_between:1,2',
        ]);
        
        $discount->product_id = $request->product_id;
        $discount->percentage = $request->percentage;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->save();
        return redirect()->route('allDiscount')->with('status', 'Discount Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(discount $discount)
    {
        $discount->delete();
        return redirect()->route('allDiscount')->with('status', 'Discount Berhasil Dihapus');
    }
}
