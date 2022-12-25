@extends('new_admin.master')
@section('title')
    <div class="page-title-icon">
        <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
    </div>
    <style>
        #ui-datepicker-div {
            width: 350px;
        }

        .btn-primary {
            margin-top: 10px;
            padding: 15px 20px;
        }
    </style>
@endsection
@section('content')
    <form method="POST" class="row ml-lg-1">
        @csrf
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-5">
                    <span>Từ Năm: </span>
                    <input type="text" class="form-control" id="datepicker" />
                </div>
                <div class="col-md-5">
                    <span>Đến Năm:</span>
                    <input type="text" class="form-control" id="datepicker2" />
                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                </div>
            </div>
            {{--  --}}
            <div class="col-md-12">
                <div class="col-md-4">
                    <p>
                        Lọc theo:
                        <select class="dashboard-filter form-control">
                            <option>-- Chọn --</option>
                            <option value="7ngay">7 Ngày qua</option>
                            <option value="thangtruoc">Tháng trước</option>
                            <option value="thangnay">Tháng này</option>
                            <option value="365ngayqua">365 Ngày qua</option>
                        </select>
                    </p>
                </div>
            </div>
        </div>
    </form>
    <div class="col-md-12">
        <div id="myfirstchart" style="height: 250px; overflow-x: auto"></div>
    </div>
    {{-- table --}}
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Bảng Thống Kê 1 Năm</h5>
                <div style="overflow-x: auto;">
                    <table class="mb-0 table table-bordered" id="tableDanhMuc">
                        <thead>
                            <tr>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <h3 class="card-title">Tổng tiền: <b></b> </h3>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            chart30daysorder();
            var chart = new Morris.Bar({
                element: 'myfirstchart',
                pointFillColors: ['#ffffff'],
                pointStrokeColors: ['black'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                parseTime: false,
                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                behaveLikeLine: true,
                labels: ['Đơn hàng', 'Doanh số', 'profit', 'quantity']
            });

            // btn
            $('#btn-dashboard-filter').click(function() {
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                $.ajax({
                    url: "/admin/quan-li-thong-ke/filter",
                    method: "POST",
                    data: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        _token: _token
                    },
                    success: function(data) {
                        // console.log(data.data);
                        chart.setData(data.data);
                    }
                });
            });

            function chart30daysorder() {

            }

            $('.dashboard-filter').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '/admin/quan-li-thong-ke/filter-dashboard',
                    method: "POST",
                    data: "JSON",
                    data: {
                        dashboard_value: dashboard_value,
                        _token: _token
                    },
                    success: function(data) {
                        // console.log(data.data);
                        chart.setData(data.data);
                    }
                });
            });



            $(function() {
                $("#datepicker").datepicker({
                    prevText: "Tháng trước",
                    nextText: "Tháng sau",
                    dateFormat: "yy-mm-dd",
                    dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                    duration: "slow",
                });
                $("#datepicker2").datepicker({
                    prevText: "Tháng trước",
                    nextText: "Tháng sau",
                    dateFormat: "yy-mm-dd",
                    dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                    duration: "slow",
                });
            });
        })
    </script>
@endsection
