<?php

namespace App\Http\Controllers;

use App\Models\SanPham;

class TestController extends Controller
{
    public function test(){
        return view('agent.reset_pass.forgotpass');
    }
    public function testphanhoi(){
        return view('agent.reset_pass.message_forgot');
    }
}
