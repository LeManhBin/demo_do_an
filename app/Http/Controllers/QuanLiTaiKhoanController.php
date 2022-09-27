<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class QuanLiTaiKhoanController extends Controller
{

    public function index()
    {
       return view('admin.pages.tai_khoan.index');
    }
    public function ListTaiKhoan(){
        $data =  Agent::all();
        return response()->json([
            'dulieutaikhoan' => $data
        ]);

    }
    public function XoaTaiKhoan($id){
        $tai_khoan = Agent::find($id);
        if($tai_khoan) {
            $tai_khoan->delete();

            return response()->json(['status' => true]);
        }

    }



}
