{{-- <div class="second-arrivals-product pb-45 pb-sm-5">
    <div class="container">
        <div class="main-product-tab-area">
            <div class="tab-menu mb-25">
                <div class="section-ttitle">
                    <h2>Best Seller</h2>
               </div>
                <!-- Nav tabs -->
                <ul class="nav tabs-area" role="tablist">
                    @foreach ($menuCha as $key => $value)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab" href="#best{{ $value->id }}">{{ $value->ten_danh_muc }} </a>
                        </li>
                    @endforeach
                </ul>

            </div>

            <!-- Tab Contetn Start -->
            <div class="tab-content">
                @foreach ($menuCha as $key => $value)
                <div id="best{{$value->id}}" class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}">
                    <div class="electronics-pro-active owl-carousel">
                        @foreach ($allSanPham as $key_sp => $value_sp)
                        @if(in_array($value_sp->id_danh_muc, explode(",", $value->tmp)))
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="/san-pham/{{$value_sp->slug_san_pham}}-post{{ $value_sp->id }}">
                                    <img class="primary-img" src="{{ $value_sp->anh_dai_dien }}" alt="single-product">
                                    <img class="secondary-img" src="{{ $value_sp->anh_dai_dien }}" alt="single-product">
                                </a>
                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info">
                                    <h4><a href="/san-pham/{{$value_sp->slug_san_pham}}-post{{ $value_sp->id }}">{{ $value_sp->ten_san_pham }}</a></h4>
                                    <p><span class="price">{{ number_format($value_sp->gia_khuyen_mai) }}</span><del class="prev-price">{{ number_format($value_sp->gia_ban) }}</del></p>
                                    <div class="label-product l_sale">{{ number_format( ($value_sp->gia_ban - $value_sp->gia_khuyen_mai) / $value_sp->gia_ban * 100, 2) }}<span class="symbol-percent">%</span></div>
                                </div>
                                <div class="pro-actions">
                                    <div class="actions-primary">
                                        <a class="addToCart" data-id="{{ $value_sp->id }}" >Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="actions-secondary">

                                        <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach

                <div id="fshion2" class="tab-pane fade">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="best-seller-pro-active owl-carousel">
                            <!-- Single Product Start -->

                            <!-- Single Product End -->
                    </div>
                    <!-- Arrivals Product Activation End Here -->
                </div>
            </div>
            <!-- Tab Content End -->
        </div>
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div> --}}
