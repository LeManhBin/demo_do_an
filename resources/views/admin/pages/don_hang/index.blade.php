@extends('new_admin.master')
@section('title')
    <div class="page-title-icon">
        <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa? Điều này không thể hoàn tác!
                    <input type="text" class="form-control" placeholder="Nhập vào id cần xóa" id="idCanXoa" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="xoa" class="btn btn-danger" data-dismiss="modal">Xóa Đơn Hàng</button>
                </div>
            </div>
        </div>
    </div>
    {{-- view chi tiet don hang --}}
    <div class="modal fade text-left" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:1000px; height: 600px; overflow-y: auto; margin-right: 300px;">
                <div class="modal-header bg-success">
                    <label class="modal-title text-text-bold-600 text-white" id="myModalLabel33">
                        <h3>Chi tiết đơn hàng</h3>
                    </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="#">
                    {{-- <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label>Tên Sản Phẩm</label>
                                            <input type="text" class="form-control" id="ten_san_pham_edit"
                                                placeholder="Nhập vào tên sản phẩm">
                                            <input type="number" class="form-control" id="id_edit">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label>Slug Sản Phẩm</label>
                                            <input type="text" class="form-control" id="slug_san_pham_edit"
                                                placeholder="Nhập vào slug sản phẩm">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label>Giá Bán</label>
                                            <input type="number" class="form-control" id="gia_ban_edit"
                                                placeholder="Nhập vào giá bán">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label>Giá Khuyến Mãi</label>
                                            <input type="number" class="form-control" id="gia_khuyen_mai_edit"
                                                placeholder="Nhập vào giá khuyến mãi">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label>Ảnh Đại Diện</label>
                                            <div class="input-group">
                                                <input id="anh_dai_dien_edit" name="anh_dai_dien" class="form-control"
                                                    type="text">
                                                <input type="button" class="btn-info lfm" data-input="anh_dai_dien_edit"
                                                    data-preview="holder_edit" value="Upload">
                                            </div>
                                            <img id="holder_edit" style="margin-top:15px;max-height:100px;">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label for="placeTextarea">Mô Tả Ngắn</label>
                                            <textarea class="form-control" id="mo_ta_ngan_edit" cols="30" rows="5"
                                                placeholder="Nhập vào mô tả ngắn"></textarea>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label>Mô Tả Chi Tiết</label>
                                    <input name="mo_ta_chi_tiet_edit" id="mo_ta_chi_tiet_edit"
                                        placeholder="Nhập vào mô tả chi tiết" type="text" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label>Trạng thái</label>
                                            <select id="is_open_edit" class="custom-select block">
                                                <option value=1>Hiển Thị</option>
                                                <option value=0>Tạm tắt</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <table class="mb-0 table table-bordered" id="tableChiTiet">
                        <thead>
                            <tr>
                                <th class="text-nowrap text-center">STT</th>
                                <th class="text-nowrap text-center">Tên sản phẩm</th>
                                <th class="text-nowrap text-center">Số lượng</th>
                                <th class="text-nowrap text-center">Đơn giá</th>
                                <th class="text-nowrap text-center">Thành tiên</th>
                                <th class="text-nowrap text-center">Tên người mua</th>
                                <th class="text-nowrap text-center">Địa chỉ</th>
                                <th class="text-nowrap text-center">Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <input type="reset" id="closeModalUpdate" class="btn btn-outline-secondary" data-dismiss="modal"
                            value="close">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="table-response">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Quản Lí đơn hàng</h5>
                    <table class="mb-0 table table-bordered" id="tableDonHang">
                        <thead>
                            <tr>
                                <th class="text-nowrap text-center">STT</th>
                                <th class="text-nowrap text-center">Mã đơn hàng</th>
                                <th class="text-nowrap text-center">Tổng tiền</th>
                                <th class="text-nowrap text-center">Khuyến mãi</th>
                                <th class="text-nowrap text-center">Thực trả</th>
                                <th class="text-nowrap text-center">Loại thanh toán</th>
                                <th class="text-nowrap text-center">Trạng Thái</th>
                                <th class="text-nowrap text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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

            function loadData() {
                $.ajax({
                    url: '/don-hang/danh-sach-don-hang',
                    type: 'get',
                    success: function(res) {
                        var html = '';



                        $.each(res.dulieudonhang, function(key, value) {
                            html += '<tr>';
                            html += '<th scope="row">' + (key + 1) + '</th>';
                            html += '<td>' + value.ma_don_hang + '</td>';
                            html += '<td>' + value.tong_tien + '</td>';
                            html += '<td>' + value.tien_giam_gia + '</td>';
                            html += '<td>' + value.thuc_tra + '</td>';
                            html += '<td>' + value.loai_thanh_toan + '</td>';
                            html += '<td>'
                            html +=
                                '<button type="button" class="btn btn-warning">Đang giao</button>'
                            html += '</td>';
                            html += '<td>';
                            html += '<button class="btn btn-primary  mr-1" data-id="' + value
                                .id +
                                '" data-toggle="modal" data-target="#viewModal"> View </button>';
                            html += '<button class="btn btn-danger nutDelete mr-1" data-id="' +
                                value.id +
                                '" data-toggle="modal" data-target="#deleteModal"> Xóa </button>';
                            html += '</td>';
                            html += '</tr>';

                        });
                        $("#tableDonHang tbody").html(html);

                    },
                });

            }
            loadData();
            $('body').on('click', '.nutDelete', function() {

                var id_don_hang = $(this).data('id');
                console.log(id_don_hang);
                $("#idCanXoa").val(id_don_hang);
            });


            function xoadonhang(id) {
                $.ajax({
                    url: '/don-hang/xoa-don-hang/' + id,
                    type: 'get',
                    success: function(res) {
                        if (res.status) {
                            loadData();
                        }
                    },
                });
            }

            $("#xoa").click(function() {
                var id_can_xoa = $("#idCanXoa").val();
                xoadonhang(id_can_xoa);
                toastr.success('Xoá đơn hàng thành công thành công!');
            });
        });
    </script>
@endsection
