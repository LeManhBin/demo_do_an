<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @toastr_css
</head>

<body>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 mt-2">Đăng kí</p>
                                    <form class="mx-1 mx-md-4" autocomplete="off">
                                        <div id="messeger">

                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Họ Và Tên</label>
                                                <input type="text" id="ho_va_ten" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Số Điện Thoại</label>
                                                <input type="phone" id="so_dien_thoai" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Email</label>
                                                <input type="email" id="email" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Mật Khẩu</label>
                                                <input type="password" id="password" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Nhập Lại Mật Khẩu</label>
                                                <input type="password" id="re_password" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Địa Chỉ</label>
                                                <input type="text" id="dia_chi" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <input class="form-check-input" id="agree" type="checkbox"
                                                value="" />
                                            <label class="form-check-label">
                                                Tôi đồng ý với các <a href="">điều khoản</a>
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button id="register" type="button" class="btn btn-primary btn-lg">Đăng
                                                kí</button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="/images/dangki.png" style="width:450px; height:650px ;" class="img-fluid"
                                        alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @jquery
    @toastr_js
    @toastr_render
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#register").click(function(e) {
                var payload = {
                    'ho_va_ten': $("#ho_va_ten").val(),
                    'so_dien_thoai': $("#so_dien_thoai").val(),
                    'email': $("#email").val(),
                    'password': $("#password").val(),
                    're_password': $("#re_password").val(),
                    'dia_chi': $("#dia_chi").val(),
                    'agree': $('#agree').get(0).checked,
                };

                console.log(payload);

                $.ajax({
                    url: '/agent/register',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        $("#messeger").append(
                            '<div class="alert alert-warning " role="alert"> Vui lòng kiểm tra Email để kích hoạt tài khoản</div>'
                            );
                        if (res.status) {
                            console.log(res.status);
                            toastr.warning("Vui lòng kiểm tra Email để kích hoạt tài khoản!");
                            setTimeout(function() {
                                $(location).attr('href',
                                    'http://127.0.0.1:8001/agent/login');;
                            }, 2000);
                        }
                    },
                    error: function(res) {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });
        });
    </script>
</body>

</html>
