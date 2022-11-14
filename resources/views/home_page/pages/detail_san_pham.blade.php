@extends('home_page.master')

@section('content')
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Home</a></li>
                    <li class="active"><a href="product.html">Sản phẩm</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    {{-- @foreach ($sanPham as $key => $value) --}}
    <div class="main-product-thumbnail ptb-100 ptb-sm-60">
        <div class="container">
            <div class="thumb-bg">
                <div class="row">
                    <!-- Main Thumbnail Image Start -->
                    <div class="col-lg-5 mb-all-40">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div id="thumb1" class="tab-pane fade show active">
                                <a data-fancybox="images" href="{{ $sanPham->anh_dai_dien }}"><img
                                        src="{{ $sanPham->anh_dai_dien }}" alt="product-view"></a>
                            </div>
                            <div id="thumb2" class="tab-pane fade">
                                <a data-fancybox="images" href="{{ $sanPham->anh_dai_dien }}"><img
                                        src="{{ $sanPham->anh_dai_dien }}" alt="product-view"></a>
                            </div>
                            <div id="thumb3" class="tab-pane fade">
                                <a data-fancybox="images" href="{{ $sanPham->anh_dai_dien }}"><img
                                        src="{{ $sanPham->anh_dai_dien }}" alt="product-view"></a>
                            </div>
                            <div id="thumb4" class="tab-pane fade">
                                <a data-fancybox="images" href="/assets_homepage/{{ $sanPham->anh_dai_dien }}"><img
                                        src="/assets_homepage/{{ $sanPham->anh_dai_dien }}" alt="product-view"></a>
                            </div>
                            <div id="thumb5" class="tab-pane fade">
                                <a data-fancybox="images" href="/assets_homepage/{{ $sanPham->anh_dai_dien }}"><img
                                        src="/assets_homepage/{{ $sanPham->anh_dai_dien }}" alt="product-view"></a>
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        {{-- <div class="product-thumbnail mt-15">
                        <div class="thumb-menu owl-carousel nav tabs-area owl-loaded owl-drag" role="tablist">
                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 780px;"><div class="owl-item active" style="width: 140.833px; margin-right: 15px;"><a class="active" data-toggle="tab" href="#thumb1"><img src="{{ $sanPham->anh_dai_dien }}" alt="product-thumbnail"></a></div><div class="owl-item active" style="width: 140.833px; margin-right: 15px;"><a data-toggle="tab" href="#thumb2"><img src="{{ $sanPham->anh_dai_dien }}" alt="product-thumbnail"></a></div><div class="owl-item active" style="width: 140.833px; margin-right: 15px;"><a data-toggle="tab" href="#thumb3"><img src="{{ $sanPham->anh_dai_dien }}" alt="product-thumbnail"></a></div><div class="owl-item active" style="width: 140.833px; margin-right: 15px;"><a data-toggle="tab" href="#thumb4"><img src="/assets_homepage/{{ $sanPham->anh_dai_dien }}" alt="product-thumbnail"></a></div><div class="owl-item" style="width: 140.833px; margin-right: 15px;"><a data-toggle="tab" href="#thumb5"><img src="/assets_homepage/{{ $sanPham->anh_dai_dien }}" alt="product-thumbnail"></a></div></div></div><div class="owl-nav">
                            <div class="owl-prev disabled"><i class="lnr lnr-arrow-left"></i></div>
                            <div class="owl-next"><i class="lnr lnr-arrow-right"></i></div></div><div class="owl-dots disabled"></div></div>
                    </div> --}}

                        <!-- Thumbnail image end -->
                    </div>
                    <!-- Main Thumbnail Image End -->
                    <!-- Thumbnail Description Start -->
                    <div class="col-lg-7">
                        <div class="thubnail-desc fix">
                            <h3 class="product-header">{{ $sanPham->ten_san_pham }}</h3>
                            <div class="rating-summary fix mtb-10">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                            </div>
                            <div class="pro-price mtb-30">
                                <p class="d-flex align-items-center"><span
                                        class="prev-price">{{ number_format($sanPham->gia_ban, 0) }} VNĐ</span><span
                                        class="price">{{ number_format($sanPham->gia_khuyen_mai, 0) }} VNĐ</span><span
                                        class="saving-price">Sale
                                        {{ number_format((($sanPham->gia_ban - $sanPham->gia_khuyen_mai) / $sanPham->gia_ban) * 100) }}%</span>
                                </p>
                            </div>
                            <p class="mb-20 pro-desc-details">{{ $sanPham->mo_ta_ngan }}</p>
                            <div class="box-quantity d-flex hot-product2">
                                <form action="#">
                                    <input class="quantity mr-15" type="number" min="1" value="1">

                                </form>

                                <div class="pro-actions">
                                    @if (Auth::guard('agent')->check())
                                        <div class="actions-primary">
                                            <a class="addToCart" data-id="{{ $sanPham->id }}"> Thêm vào giỏ hàng</a>
                                            {{-- <a class="addToCart" data-id="{{ $value->id }}" > Thêm vào giỏ hàng</a> --}}
                                        </div>
                                    @else
                                        <div class="actions-primary">
                                            <a href="cart.html" data-toggle="modal" data-target="#myModal"> Thêm vào giỏ
                                                hàng</a>
                                        </div>
                                    @endif
                                    @if (Auth::guard('agent')->check())
                                        <div class="actions-secondary">
                                            <a class="add" data-id="{{ $sanPham->id }}"><i class="lnr lnr-heart"></i>
                                                <span>Yêu thích</span></a>
                                        </div>
                                    @else
                                        <div class="actions-secondary">
                                            <a href="wishlist.html" title="" data-original-title=""><i
                                                    class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Description End -->
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    {{-- @endforeach --}}
    <div class="thumnail-desc pb-100 pb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc nav tabs-area" role="tablist">
                        <li><a class="active" data-toggle="tab" href="#dtail">Chi tiết sản phẩm</a></li>
                        <li><a data-toggle="tab" href="#review">Đánh giá</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        <div id="dtail" class="tab-pane fade show active">
                            <p class="motachitiet">
                                {{-- {{ $sanPham->mo_ta_chi_tiet }} --}}
                            </p>

                        </div>
                        {{-- <div id="review" class="tab-pane fade">
                            <!-- Reviews Start -->
                            <ul class="list-inline rating" title="Average Rating">
                                @for ($count = 1; $count <= 5; $count++)
                                    @php
                                        if ($count <= $rating) {
                                            $color = 'color:#ffcc00;'
                                        }else {
                                            $color = 'color:#ccc'
                                        }
                                    @endphp
                                    <li title="star_rating" id="{{ $sanPham->san_pham_id }} - {{ $count }}"
                                        data-index="{{ $count }}" data-san_pham_id="{{ $sanPham->san_pham_id }}"
                                        data-rating="{{ $rating }}" class="rating"
                                        style="cursor: pointer;font-size: 30px;
                                            {{ $color }}">
                                        &#9733;</li>
                                @endfor
                            </ul>
                        </div> --}}
                        <div id="review" class="tab-pane fade">
                            <!-- Reviews Start -->
                            <!-- Reviews Start -->
                            <div class="review border-default universal-padding mt-30">
                                {{-- <div class="riview-field mt-40">
                                    <form autocomplete="off" action="#">
                                        <div class="form-group">
                                            <label class="req" for="sure-name">Tên</label>
                                            <input type="text" class="form-control" id="sure-name"
                                                required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="subject">Summary</label>
                                            <input type="text" class="form-control" id="subject"
                                                required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="comments">Review</label>
                                            <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                        </div>
                                        <button type="submit" class="customer-btn">Submit Review</button>
                                    </form>
                                </div> --}}
                                <!-- Reviews Field Start -->
                                <div class="col-sm-12">
                                    <style type="text/css">
                                        .style_comment {
                                            border: 1px solid black;
                                            border-radius: 10px;
                                            background: whitesmoke;
                                        }

                                        .style_comment img {
                                            width: 50px;
                                            box-shadow: none !important;
                                            padding: 0px !important;
                                            border: 0px !important;
                                            background: none !important;
                                        }
                                    </style>
                                    <form>
                                        @csrf
                                        <input type="hidden" name="commemt_san_pham_id" id="commemt_san_pham_id"
                                            value="{{ $sanPham->id }}">
                                        <div id="comment_show">

                                        </div>
                                        {{-- <div class="row style_comment">
                                            <div class="col-md-2">
                                                <input type="hidden" name="commemt_san_pham_id" id="commemt_san_pham_id"
                                                    value="{{ $sanPham->id }}">
                                                <img src="data:image/png;base64,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"
                                                    alt="" class="img img-responsive-img-thumbnail">
                                            </div>
                                            <div class="col-md-10">
                                                <p style="font-size: 20px; font-weight: 600;">@manhbin</p>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem
                                                    perspiciatis
                                                </p>
                                            </div>
                                        </div> --}}
                                        <p></p>
                                    </form>
                                    <form autocomplete="off" action="#">
                                        <div class="form-group">
                                            <label class="req" for="sure-name">Tên</label>
                                            <input type="text" class="form-control" id="sure-name"
                                                required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="subject">Email</label>
                                            <input type="email" class="form-control" id="subject"
                                                required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="comments">Review</label>
                                            <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                        </div>
                                        <button type="submit" class="customer-btn">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Reviews End -->
                        </div>
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>

    <div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
        <div class="container">
            <!-- Product Title Start -->
            <div class="post-title pb-30">
                <h2 style="background-color: #FD841F !important">Sản Phẩm Tương Tự</h2>
            </div>
            <!-- Product Title End -->
            <!-- Hot Deal Product Activation Start -->
            <div class="hot-deal-active owl-carousel">
                <!-- Single Product Start -->
                @foreach ($allSanPham as $key => $value)
                    <div class="single-product" style="border-radius: 10px; ">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="/san-pham/{{ $value->slug_san_pham }}-post{{ $value->id }}">
                                <img class="primary-img" src="{{ $value->anh_dai_dien }}" alt="single-product">
                                <img class="secondary-img" src="{{ $value->anh_dai_dien }}" alt="single-product">
                            </a>
                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal"
                                title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a
                                        href="/san-pham/{{ $value->slug_san_pham }}-post{{ $value->id }}">{{ $value->ten_san_pham }}</a>
                                </h4>
                                <p><span class="price">{{ number_format($value->gia_khuyen_mai, 0) }} VNĐ</span></p>
                            </div>
                            <div class="pro-actions">
                                @if (Auth::guard('agent')->check())
                                    <div class="actions-primary">
                                        <a class="addToCart" data-id="{{ $value->id }}"> Thêm vào giỏ hàng</a>
                                    </div>
                                @else
                                    <div class="actions-primary">
                                        <a href="cart.html" data-toggle="modal" data-target="#myModal"> Thêm vào giỏ
                                            hàng</a>
                                    </div>
                                @endif
                                @if (Auth::guard('agent')->check())
                                    <div class="actions-secondary">
                                        <a class="add" data-id="{{ $value->id }}"><i class="lnr lnr-heart"></i>
                                            <span>Yêu thích</span></a>
                                    </div>
                                @else
                                    <div class="actions-secondary">
                                        <a href="wishlist.html" title="" data-original-title=""><i
                                                class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">new</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5>Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="alert alert-success" role="alert">
                            Bạn phải đăng nhập để mua sản phẩm!!!
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="email" class="form-control" aria-describedby="emailHelp"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="button" id="login" class="btn btn-primary">Đăng Nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.querySelector('.motachitiet').innerHTML = "<?php echo $sanPham->mo_ta_chi_tiet; ?>";
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            load_comment();

            function load_comment() {
                var san_pham_id = $('#commemt_san_pham_id').val();
                // alert(san_pham_id)
                console.log(san_pham_id);
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '/load-comment',
                    type: 'post',
                    data: {
                        san_pham_id: san_pham_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#comment_show').html(data);
                    }
                });
            }
        });
    </script>
@endsection
