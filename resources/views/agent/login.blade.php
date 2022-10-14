{{-- <!doctype html>
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
                                    <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 mt-2">Login</p>

                                    <form class="mx-1 mx-md-4" autocomplete="off">
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
                                        <div class="d-flex justify-content-end mx-4 mb-3 mb-lg-4">
                                            <button id="login" type="button"
                                                class="btn btn-primary btn-lg">Login</button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="/images/logo-btech.png"
                                        class="img-fluid" alt="Sample image">

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

            $("#login").click(function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();
                var payload = {
                    'email'     : email,
                    'password'  : password,
                };
                $.ajax({
                    url     :   '/agent/login',
                    data    :   payload,
                    type    :   'post',
                    success :   function(res) {
                        if(res.status == 2) {
                            toastr.success('Bạn đã login thành công!');
                            setTimeout(function(){
                                $(location).attr('href','http://127.0.0.1:8000');;
                            }, 2000);
                        } else if(res.status == 1) {
                            toastr.warning("Bạn cần phải kích hoạt email");
                        } else {
                            toastr.error("Đăng nhập thất bại!");
                        }
                    },
                    error   :   function(res) {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    }
                });
            });
        });
    </script>
</body>

</html> --}}
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @toastr_css
    </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Đăng nhập
            </div>
            <div class="title signup">
               Đăng ký
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="#" class="login">
                  <div class="field">
                     <input type="text" id="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password"  id="password" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="/test">Quên mật khẩu?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" id="sign_in" value="Login">
                  </div>
               </form>
               {{-- Đăng ký form --}}
               <form action="#" class="signup">
                <div id="messeger">

                </div>
                  <div class="field">
                     <input type="text" id="ho_va_ten" placeholder="Họ Và Tên" required>
                  </div>
                  <div class="field">
                     <input type="text" id="so_dien_thoai" placeholder="Số Điện Thoại" required>
                  </div>
                  <div class="field">
                     <input type="text" id="email_dangki" placeholder="Email" required>
                  </div>
                  <div class="field">
                     <input type="password" id="password_dangki" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" id="re_password" placeholder="Confirm Password" required>
                  </div>
                  <div class="field">
                     <input type="text" id="dia_chi" placeholder="Địa Chỉ" required>
                  </div>
                  <div>
                     <input class="form-check-input" id="agree" type="checkbox" value="" />
                     <label class="form-check-label">
                        Tôi đồng ý với các <a href="">điều khoản</a>
                     </label>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input id="register" type="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
        @jquery
        @toastr_js
        @toastr_render
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
      <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#sign_in").click(function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();
                var payload = {
                    'email'     : email,
                    'password'  : password,
                };
                console.log(payload);
                $.ajax({
                    url     :   '/agent/login',
                    data    :   payload,
                    type    :   'post',
                    success :   function(res) {
                        if(res.status == 2) {
                            toastr.success('Bạn đã login thành công!');
                            setTimeout(function(){
                                $(location).attr('href','http://127.0.0.1:8000');;
                            }, 2000);
                        } else if(res.status == 1) {
                            toastr.warning("Bạn cần phải kích hoạt email");
                        // }else if(res.status == 3) {
                        //     toastr.success('Admin đã login thành công!');
                        //     setTimeout(function(){
                        //         $(location).attr('href','http://127.0.0.1:8000/admin/danh-muc-san-pham/index/');;
                        //     }, 2000);
                        // }
                        } else {
                            toastr.error("Tài khoản hoặc mật khẩu không chính xác");
                        }
                    },
                    error   :   function(res) {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    }
                });
            });
            //Đăng ký
            $("#register").click(function(e) {
                var payload = {
                    'ho_va_ten'     : $("#ho_va_ten").val(),
                    'so_dien_thoai' : $("#so_dien_thoai").val(),
                    'email'         : $("#email_dangki").val(),
                    'password'      : $("#password_dangki").val(),
                    're_password'   : $("#re_password").val(),
                    'dia_chi'       : $("#dia_chi").val(),
                    'agree'         : $('#agree').get(0).checked,
                };
                console.log(payload);

                $.ajax({
                    url     :   '/agent/register',
                    type    :   'post',
                    data    :   payload,
                    success :   function(res) {
                        $("#messeger").append('<div class="alert alert-warning " role="alert"> Vui lòng kiểm tra Email để kích hoạt tài khoản</div>');
                        if(res.status){
                            console.log(res.status);
                            toastr.warning("Vui lòng kiểm tra Email để kích hoạt tài khoản!");
                            setTimeout(function(){
                                $(location).attr('href','http://127.0.0.1:8000/agent/login');;
                            }, 2000);
                        }
                    },

                    error   :   function(res) {
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    },
                });
            });
        });
    </script>
   </body>
</html>
