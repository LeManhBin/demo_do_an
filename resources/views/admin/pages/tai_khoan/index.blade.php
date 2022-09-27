@extends('new_admin.master')
@section('title')
<div class="page-title-icon">
    <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Xóa Tài Khoản</h5>
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
          <button type="button" id="xoa" class="btn btn-danger" data-dismiss="modal">Xóa Tài Khoản</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="table-response">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Quản Lí Tài Khoản</h5>
                <table class="mb-0 table table-bordered" id="tableTaiKhoan">
                    <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
                        <th class="text-nowrap text-center">Họ và tên</th>
                        <th class="text-nowrap text-center">Số điện thoại</th>
                        <th class="text-nowrap text-center">Email</th>
                        <th class="text-nowrap text-center">Địa chỉ</th>
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
{{-- <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script> --}}
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function loadData() {
            $.ajax({
                url     :   '/admin/quan-li-tai-khoan/danh-sach-tai-khoan',
                type    :   'get',
                success :   function(res) {
                    var html = '';

                    $.each(res.dulieutaikhoan, function(key, value) {
                        html += '<tr>';
                        html += '<th scope="row">' + (key + 1) + '</th>';
                        html += '<td>' + value.ho_va_ten + '</td>';
                        html += '<td>' + value.so_dien_thoai + '</td>';
                        html += '<td>' + value.email + '</td>';
                        html += '<td>' + value.dia_chi + '</td>';
                        html += '<td>';
                        html += '<button class="btn btn-danger nutDelete mr-1" data-id="' + value.id + '" data-toggle="modal" data-target="#deleteModal"> Xóa </button>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $("#tableTaiKhoan tbody").html(html);
                },
            });
        }
        loadData();
        $('body').on('click', '.nutDelete', function(){
            console.log(123);
            var id_tai_khoan = $(this).data('id');
            console.log(id_tai_khoan);
            $("#idCanXoa").val(id_tai_khoan);
        });


        function xoataikhoan(id) {
            $.ajax({
				url     :   '/admin/quan-li-tai-khoan/xoa-tai-khoan/' + id,
				type    :   'get',
				success :   function(res) {
					if(res.status) {
						loadData();
					}
				},
			});
        }

        $("#xoa").click(function(){
            var id_can_xoa = $("#idCanXoa").val();
            xoataikhoan(id_can_xoa);
            toastr.success('Xoá tài khoản thành công thành công!');
        });
    });
</script>
@endsection
