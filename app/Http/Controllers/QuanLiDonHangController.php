<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\ChiTietDonHang;
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
    public function ListDonHang()
    {
        $data =  DonHang::all();
        return response()->json([
            'dulieudonhang' => $data
        ]);
    }
    public function deleteDonHang($id)
    {
        $don_hang = DonHang::find($id);
        if ($don_hang) {
            $don_hang->delete();

            return response()->json(['status' => true]);
        }
    }
    public function chiTietDonHang($id)
    {
        $data = ChiTietDonHang::join('agents', 'chi_tiet_don_hangs.agent_id', '=', 'agents.id')
            ->where('chi_tiet_don_hangs.don_hang_id', $id)
            ->select('chi_tiet_don_hangs.*', 'agents.ho_va_ten', 'agents.dia_chi', 'agents.so_dien_thoai')
            ->get();
        return response()->json([
            'dulieuchitietdonhang' => $data
        ]);
        dd($data);
    }
}
