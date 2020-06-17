<?php

namespace App\Http\Controllers;

use App\courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_courier = courier::get();
        return view ('courier/courier', compact('all_courier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('courier/tambahcourier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pn = new courier();
        $pn->id = $request->id;
        $pn->courier = $request->courier;
        $pn->save();
        return redirect()->route('allCourier')->with('status', 'Courier Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(courier $courier)
    {
        return view('courier/editcourier',compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courier $courier)
    {
        $courier->courier = $request->courier;
        $courier->save();
        return redirect()->route('allCourier')->with('status', 'Courier Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(courier $courier)
    {
        $courier->delete();
        return redirect()->route('allCourier')->with('status', 'Courier Berhasil Dihapus');
    }
}
