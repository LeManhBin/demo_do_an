<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToLikeRequest;
use Illuminate\Http\Request;
use App\Models\ChiTietYeuThich;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;
class YeuThichController extends Controller
{
    public function index(){
        return view('home_page.pages.like.index');
    }
    public function addToLike(AddToLikeRequest $request){
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $sanPham = SanPham::find($request->san_pham_id);
            // dd($sanPham);
            $ChiTietYeuThich = ChiTietYeuThich::where('san_pham_id', $request->san_pham_id)
                                            ->where('agent_id', $agent->id)
                                            ->first();

            if(!$ChiTietYeuThich) {
                ChiTietYeuThich::create([
                    'san_pham_id'       => $sanPham->id,
                    'ten_san_pham'      => $sanPham->ten_san_pham,
                    'don_gia'           => $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban,
                    'so_luong'          => 1,
                    'agent_id'          => $agent->id,
                ]);
            }
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
    public function removeYeuThich(Request $request){
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $ChiTietYeuThich = ChiTietYeuThich:: where('agent_id', $agent->id)

                                            ->where('san_pham_id', $request->san_pham_id)
                                            ->first();
            $ChiTietYeuThich->delete();
        }
    }
    public function addToLikeUpdate(AddToLikeRequest $request ){
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $sanPham = SanPham::find($request->san_pham_id);

            $ChiTietYeuThich = ChiTietYeuThich::where('san_pham_id', $request->san_pham_id)

                                            ->where('agent_id', $agent->id)
                                            ->first();
            if($ChiTietYeuThich) {
                $ChiTietYeuThich->so_luong = $request->so_luong;
                $ChiTietYeuThich->save();
            } else {
                $ChiTietYeuThich::create([
                    'san_pham_id'       => $sanPham->id,
                    'ten_san_pham'      => $sanPham->ten_san_pham,
                    'don_gia'           => $sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban,
                    'so_luong'          => $request->so_luong,

                    'agent_id'          => $agent->id,
                ]);
            }

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
    public function dataYeuThich(){
        $agent = Auth::guard('agent')->user();
        if($agent) {
            $data = ChiTietYeuThich::join('san_phams', 'danh_sach_yeu_thich.san_pham_id', 'san_phams.id')
                                  ->where('agent_id', $agent->id)
                                  ->select('danh_sach_yeu_thich.*', 'san_phams.anh_dai_dien')
                                  ->get();

            return response()->json(['data' => $data]);
        }
    }
}


