<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Models\AdminAcc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class AdminAccController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function loginAction(AdminLoginRequest $request){
        $data  = $request->all();
        $check = Auth::guard('admin')->attempt($data);
        if($check)
        {
            //Login thành công
            return response()->json(['status'=>1]);

        }else{
            //Login thất bại
            return response()->json(['status' =>0]);
        }
    }
}
