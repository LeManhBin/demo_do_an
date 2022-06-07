@extends('new_admin.master')
@section('title')
    <h3>Quản Lý Đơn Hàng</h3>
@endsection
@section('content')
<div id="app" class="row">
        <div class="card">
            <div class="card-header" style="height: auto">
                <h4 class="card-title">Đơn hàng</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Khách Hàng</th>
                                <th class="text-center">Địa Chỉ</th>
                                <th class="text-center">Số Điện Thoại</th>
                                <th class="text-center">Tên Sản Phẩm</th>
                                <th class="text-center">Số Lượng</th>
                                <th class="text-center">Thành Tiền</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center">1</th>
                                <th class="text-center">Lê Mạnh Bin</th>
                                <th class="text-center">Đà Nẵng</th>
                                <th class="text-center">0365160470</th>
                                <th class="text-center">Nike Air Force 1 - All White</th>
                                <th class="text-center">1</th>
                                <th class="text-center">2,649,000</th>
                                <th> <button type="button" class="btn btn-success">Đã giao</button></th>
                                <th>
                                    <button class="btn btn-danger delete mr-1">Delete</button>
                                    <button class="btn btn-primary edit mr-1" >?</button>
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

