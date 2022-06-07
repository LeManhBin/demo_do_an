<?php

namespace App\Http\Controllers;

use App\Models\QuanLiDonHang;
use Illuminate\Http\Request;

class QuanLiDonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.don_hang.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuanLiDonHang  $quanLiDonHang
     * @return \Illuminate\Http\Response
     */
    public function show(QuanLiDonHang $quanLiDonHang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuanLiDonHang  $quanLiDonHang
     * @return \Illuminate\Http\Response
     */
    public function edit(QuanLiDonHang $quanLiDonHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuanLiDonHang  $quanLiDonHang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuanLiDonHang $quanLiDonHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuanLiDonHang  $quanLiDonHang
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuanLiDonHang $quanLiDonHang)
    {
        //
    }
}
