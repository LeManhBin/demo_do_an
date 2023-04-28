<?php

namespace App\Http\Controllers;

use App\Models\quan_li_thong_ke;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuanLiThongKeController extends Controller
{
    public function index()
    {
        return view('admin.pages.quan_li_thong_ke.index');
    }

    public function filter(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = quan_li_thong_ke::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();

        $chart_data = [];

        foreach ($get as $key => $val) {
            array_push($chart_data, array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                // 'profit' => $val->profit,
                'quantity' => $val->quantity,
                'total' => $val->total
            ));
            // $chart_data[] = array(
            //     'period' => $val->order_date,
            //     'order' => $val->total_order,
            //     'sales' => $val->sales,
            //     'profit' => $val->profit,
            //     'quantity' => $val->quantity,
            // );
        }
        // dd($chart_data);
        return response()->json([
            'data' => $chart_data
        ]);
    }

    public function filterDashboard(Request $request)
    {
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay') {
            $get = quan_li_thong_ke::whereBetween('order_date', [$sub7days, $now])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $get = quan_li_thong_ke::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'thangnay') {
            $get = quan_li_thong_ke::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
        } else {
            $get = quan_li_thong_ke::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
        }

        $chart_data = [];
        foreach ($get as $key => $val) {
            array_push($chart_data, array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                // 'profit' => $val->profit,
                'quantity' => $val->quantity,
            ));
            // $chart_data[] = array(
            //     'period' => $val->order_date,
            //     'order' => $val->total_order,
            //     'sales' => $val->sales,
            //     'profit' => $val->profit,
            //     'quantity' => $val->quantity,
            // );
        }
        // echo $data = json_encode($chart_data);
        return response()->json([
            'data' => $chart_data
        ]);
    }
}
