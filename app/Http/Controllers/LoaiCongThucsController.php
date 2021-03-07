<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiCongThuc;

class LoaiCongThucsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loaicongthucs = LoaiCongThuc::where('da_xoa',0)->get();
        return view('type-products',compact('loaicongthucs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $loaicongthuc = LoaiCongThuc::create($request->all());
        return response()->json($loaicongthuc);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loaicongthuc = LoaiCongThuc::find($id);
        $loaicongthuc->ten_loai_cong_thuc = $request->ten_loai_cong_thuc;
        $loaicongthuc->save();
        return response()->json($loaicongthuc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $loaicongthuc = LoaiCongThuc::find($id);
        $loaicongthuc->da_xoa = 1;
        $loaicongthuc->save();
        return response()->json($loaicongthuc);
    }
}
