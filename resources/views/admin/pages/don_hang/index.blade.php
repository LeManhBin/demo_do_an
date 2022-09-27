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
@endsection
@section('content')
<div class="col-md-12">
    <div class="table-response">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Quản Lí đơn hàng</h5>
                <table class="mb-0 table table-bordered" id="tableDonHang">
                    <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
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
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function loadData() {
            $.ajax({
                url     :   '/don-hang/danh-sach-don-hang',
                type    :   'get',
                success :   function(res) {
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
                        html += '<button type="button" class="btn btn-warning">Đang giao</button>'
                        html += '</td>';
                        html += '<td>';
                        html += '<button class="btn btn-danger nutDelete mr-1" data-id="' + value.id + '" data-toggle="modal" data-target="#deleteModal"> Xóa </button>';
                        html += '</td>';
                        html += '</tr>';

                    });
                    $("#tableDonHang tbody").html(html);


                },
            });

        }
        loadData();
        $('body').on('click', '.nutDelete', function(){

            var id_don_hang = $(this).data('id');
            console.log(id_don_hang);
            $("#idCanXoa").val(id_don_hang);
        });


        function xoadonhang(id) {
            $.ajax({
				url     :   '/don-hang/xoa-don-hang/' + id,
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
            xoadonhang(id_can_xoa);
            toastr.success('Xoá đơn hàng thành công thành công!');
        });
    });
</script>
@endsection
