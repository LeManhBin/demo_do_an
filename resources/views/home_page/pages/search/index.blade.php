@extends('home_page.master')

@section('content')
    <div class="breadcrumb-area mt-30">
        <!-- Container End -->
    </div>
    <div class="main-shop-page pb-100 ptb-sm-60">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- Grid & List View Start -->
                    <div
                        class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                        <div class="grid-list-view  mb-sm-15">
                            <ul class="nav tabs-area d-flex align-items-center">
                                <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                            </ul>
                        </div>
                        <!-- Toolbar Short Area Start -->


                    </div>
                    <!-- Grid & List View End -->
                    <div class="main-categorie mb-all-40">
                        <!-- Grid & List Main Area End -->
                        <div class="tab-content fix">
                            @include('home_page.pages.compoment_san_pham.list_san_pham')
                            <!-- #grid view End -->
                            <div id="list-view" class="tab-pane fade">
                                @foreach ($sanPham as $key => $value)
                                    <div class="single-product">
                                        <div class="row">
                                            <!-- Product Image Start -->
                                            <div class="col-lg-4 col-md-5 col-sm-12">
                                                <div class="pro-img">
                                                    <a href="/san-pham/{{ $value->slug_san_pham }}-post{{ $value->id }}">{{ $value->ten_san_pham }}">
                                                        <img class="primary-img" src="{{ $value->anh_dai_dien }}"
                                                            alt="single-product">
                                                        <img class="secondary-img" src="{{ $value->anh_dai_dien }}"
                                                            alt="single-product">
                                                    </a>
                                                    <a href="#" class="quick_view" data-toggle="modal"
                                                        data-target="#myModal" title=""
                                                        data-original-title="Quick View"><i
                                                            class="lnr lnr-magnifier"></i></a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="col-lg-8 col-md-7 col-sm-12">
                                                <div class="pro-content hot-product2">
                                                    <h4><a
                                                            href="/san-pham/{{ $value->slug_san_pham }}-post{{ $value->id }}">{{ $value->ten_san_pham }}">{{ $value->ten_san_pham }}</a>
                                                    </h4>
                                                    <p><span class="price">{{ number_format($value->gia_khuyen_mai, 0) }}
                                                            VNĐ</span></p>
                                                    <p>{!! strlen($value->mo_ta_ngan) > 200 ? substr($value->mo_ta_ngan, 0, 150) . '...' : $value->mo_ta_ngan !!}</p>
                                                    <div class="pro-actions">
                                                        @if (Auth::guard('agent')->check())
                                                            <div class="actions-primary">
                                                                <a class="addToCart" data-id="{{ $value->id }}"> Thêm
                                                                    vào giỏ hàng</a>
                                                            </div>
                                                        @else
                                                            <div class="actions-primary">
                                                                <a href="cart.html" data-toggle="modal"
                                                                    data-target="#myModal"> Thêm vào giỏ hàng</a>
                                                            </div>
                                                        @endif
                                                        @if (Auth::guard('agent')->check())
                                                            <div class="actions-secondary">
                                                                <a class="add" data-id="{{ $value->id }}"><i
                                                                        class="lnr lnr-heart"></i> <span>Yêu
                                                                        thích</span></a>
                                                            </div>
                                                        @else
                                                            <div class="actions-secondary">
                                                                <a href="wishlist.html" title=""
                                                                    data-original-title=""><i class="lnr lnr-heart"></i>
                                                                    <span>Yêu thích</span></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- #list view End -->
                            <div class="pro-pagination">
                                <ul class="blog-pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- Product Pagination Info -->
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                </div>
                <!-- product Categorie List End -->
            </div>
            <!-- Row End -->
        </div>

    </div>
@endsection
