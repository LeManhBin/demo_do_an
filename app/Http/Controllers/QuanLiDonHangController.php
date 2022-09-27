<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
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
    public function ListDonHang(){
        $data =  DonHang::all();
        return response()->json([
            'dulieudonhang' => $data
        ]);
    }
    public function deleteDonHang($id){
        $don_hang = DonHang::find($id);
        if($don_hang) {
            $don_hang->delete();

            return response()->json(['status' => true]);
        }
    }

}
