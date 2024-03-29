<!-- Main Header Area Start Here -->
<header>
    <!-- Header Top Start Here -->
    <div class="header-top-area">
        <div class="container">
            <!-- Header Top Start -->
            <div class="header-top">
                <ul>
                    <li style="height: 40px">Tài Khoản Của Tôi<i class="lnr lnr-chevron-down"></i>
                        <!-- Dropdown Start -->
                        @if (Auth::guard('agent')->check())
                            <ul class="ht-dropdown">
                                <li><a href="/agent/logout">Đăng xuất</a></li>
                            </ul>
                        @else
                            <ul class="ht-dropdown">
                                <li><a href="/agent/login">Đăng nhập</a></li>
                                {{-- <li><a href="/agent/register">Đăng kí</a></li> --}}
                            </ul>
                        @endif

                        <!-- Dropdown End -->
                    </li>
                    <li>Quản trị viên<i class="lnr lnr-chevron-down"></i>
                        <!-- Dropdown Start -->

                        <ul class="ht-dropdown">
                            <li><a href="/admin/login">Đăng nhập</a></li>
                        </ul>

                        <!-- Dropdown End -->
                    </li>
                </ul>
            </div>
            <!-- Header Top End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End Here -->
    <!-- Header Middle Start Here -->
    <div class="header-middle ptb-15">
        <div class="container">
            <div class="row align-items-center no-gutters" style="display: flex; align-items: center">
                <div class="col-lg-2 col-md-12">
                    <div class="logo mb-all-30">
                        <a href="/"><img src="/images/logo-btech.png" alt="logo-image" height="150px"></a>
                    </div>
                </div>
                <!-- Categorie Search Box Start Here -->
                <div class="col-lg-4 col-md-8 ml-auto mr-auto col-10">
                    <div class="categorie-search-box">
                        <form action="/admin/san-pham/search" method="post">
                            @csrf

                            <input type="text" name="search" placeholder="Nhập tên sản phẩm cần tìm..."
                                autocomplete="off" style="color: #000">
                            <button type="submit" style="background-color: #FD841F"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Categorie Search Box End Here -->
                <!-- Cart Box Start Here -->
                <div class="col-lg-6 col-md-12">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                            <style>
                                li a:hover,
                                span:hover {
                                    color: #FD841F !important
                                }

                                .addToCart:hover {
                                    background-color: #FD841F !important;
                                }
                            </style>
                            <li>
                                <a href="/cart"><i class="fa-solid fa-cart-shopping"></i>
                                    <span class="my-cart"><span class="total-pro"></span><span>Giỏ
                                            hàng</span></span></a>
                            </li>
                            <li><a href="/yeuthich"><i class="fa-solid fa-heart"></i>
                                    <span class="my-cart"><span class="total-pro"></span><span>Yêu
                                            thích</span></span></a>
                            </li>
                            @if (Auth::guard('agent')->check())
                                <li><a href="#"><i class="fa-sharp fa-solid fa-circle-user"></i>
                                        <span class="my-cart">
                                            <span>
                                                <strong>{{ Auth::guard('agent')->user()->ho_va_ten }}</strong>
                                            </span>
                                        </span>

                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="/agent/login"><i class="fa-sharp fa-solid fa-circle-user"></i>
                                        <span class="my-cart"><span class="total-pro"></span><span>Đăng
                                                Nhập</span></span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Cart Box End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Middle End Here -->
    <!-- Header Bottom Start Here -->
    <div class="header-bottom  header-sticky">
        <div class="container" style="display: flex; justify-content: center">
            <div class="row align-items-center">
                {{-- <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                    <span class="categorie-title">Shop by Categories </span>
                </div> --}}
                <div class="col-xl-9 col-lg-8 col-md-12 ">
                    <nav class="d-none d-lg-block">
                        <ul class="header-bottom-list d-flex">
                            <li class="active" style="white-space: nowrap;"><a href="/"> <img
                                        src="/images/home.png" width="25" height="25" alt=""> Home</a>
                            </li>
                            @foreach ($menuCha as $value_cha)
                                <li style="white-space: nowrap; text-align: center;">
                                    <a href="/danh-muc/{{ $value_cha->slug_danh_muc }}-post{{ $value_cha->id }}"><img
                                            src="{{ $value_cha->hinh_anh }}" alt="" width="25"
                                            height="25" style="">{{ $value_cha->ten_danh_muc }} <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="ht-dropdown"
                                        style="white-space: nowrap; display: flex; flex-direction: column; align-items: flex-start;">
                                        @foreach ($menuCon as $value_con)
                                            @if ($value_con->id_danh_muc_cha == $value_cha->id)
                                                <li><a href="/danh-muc/{{ $value_con->id }}"><img
                                                            src="{{ $value_con->hinh_anh }}" alt=""
                                                            width="20" height="20"
                                                            style="">&nbsp;{{ $value_con->ten_danh_muc }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach


                        </ul>
                    </nav>
                    {{-- <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="index.html">home</a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul>
                                        <li><a href="index.html">Home Version 1</a></li>
                                        <li><a href="index-2.html">Home Version 2</a></li>
                                        <li><a href="index-3.html">Home Version 3</a></li>
                                        <li><a href="index-4.html">Home Version 4</a></li>
                                    </ul>
                                    <!-- Home Version Dropdown End -->
                                </li>
                                <li><a href="shop.html">shop</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="product.html">product details</a></li>
                                        <li><a href="compare.html">compare</a></li>
                                        <li><a href="cart.html">cart</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="single-blog.html">blog details</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="#">pages</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="register.html">register</a></li>
                                        <li><a href="login.html">sign in</a></li>
                                        <li><a href="forgot-password.html">forgot password</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="about.html">about us</a></li>
                                <li><a href="contact.html">contact us</a></li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Bottom End Here -->
    <!-- Mobile Vertical Menu Start Here -->
    {{-- <div class="container d-block d-lg-none">
        <div class="vertical-menu mt-30">
            <span class="categorie-title mobile-categorei-menu">Shop by Categories</span>
            <nav>
                <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                    <ul>
                        <li class="has-sub"><a href="#">Automotive & Motorcycle </a>
                            <ul class="category-sub">
                                <li class="has-sub"><a href="shop.html">Office chair</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Bibendum Cursus</a></li>
                                        <li><a href="shop.html">Dignissim Turpis</a></li>
                                        <li><a href="shop.html">Dining room</a></li>
                                        <li><a href="shop.html">Dining room</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="shop.html">Purus Lacus</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Magna Pellentesq</a></li>
                                        <li><a href="shop.html">Molestie Tortor</a></li>
                                        <li><a href="shop.html">Vehicula Element</a></li>
                                        <li><a href="shop.html">Sagittis Blandit</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">gps accessories</a></li>
                                <li><a href="shop.html">Microphones</a></li>
                                <li><a href="shop.html">Wireless Transmitters</a></li>
                            </ul>
                            <!-- category submenu end-->
                        </li>
                        <li class="has-sub"><a href="#">Sports & Outdoors</a>
                            <ul class="category-sub">
                                <li class="menu-tile">Cameras</li>
                                <li><a href="shop.html">Cords and Cables</a></li>
                                <li><a href="shop.html">gps accessories</a></li>
                                <li><a href="shop.html">Microphones</a></li>
                                <li><a href="shop.html">Wireless Transmitters</a></li>
                            </ul>
                            <!-- category submenu end-->
                        </li>
                        <li class="has-sub"><a href="#">Home & Kitchen</a>
                            <ul class="category-sub">
                                <li><a href="shop.html">kithen one</a></li>
                                <li><a href="shop.html">kithen two</a></li>
                                <li><a href="shop.html">kithen three</a></li>
                                <li><a href="shop.html">kithen four</a></li>
                            </ul>
                            <!-- category submenu end-->
                        </li>
                        <li class="has-sub"><a href="#">Phones & Tablets</a>
                            <ul class="category-sub">
                                <li><a href="shop.html">phone one</a></li>
                                <li><a href="shop.html">Tablet two</a></li>
                                <li><a href="shop.html">Tablet three</a></li>
                                <li><a href="shop.html">phone four</a></li>
                            </ul>
                            <!-- category submenu end-->
                        </li>
                        <li class="has-sub"><a href="#">TV & Video</a>
                            <ul class="category-sub">
                                <li><a href="shop.html">smart tv</a></li>
                                <li><a href="shop.html">real video</a></li>
                                <li><a href="shop.html">Microphones</a></li>
                                <li><a href="shop.html">Wireless Transmitters</a></li>
                            </ul>
                            <!-- category submenu end-->
                        </li>
                        <li><a href="#">Beauty</a> </li>
                        <li><a href="#">Sport & tourisim</a></li>
                        <li><a href="#">Meat & Seafood</a></li>
                    </ul>
                </div>
                <!-- category-menu-end -->
            </nav>
        </div>
    </div> --}}
    <!-- Mobile Vertical Menu Start End -->
</header>
<!-- Main Header Area End Here -->
