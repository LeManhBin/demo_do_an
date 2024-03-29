<div class="arrivals-product pb-85 pb-sm-45">
    <div class="container">
        <div class="main-product-tab-area">
            {{-- <div class="tab-menu mb-25"
                style="background-color: #FD841F !important; border-radius: 5px; padding: 5px 10px"> --}}
            <div class="title-new">
                <h1><i class="fa-solid fa-star"></i> Sản Phẩm mới</h1>
            </div>
            <!-- Nav tabs -->
            <ul class="nav tabs-area newproduct-list" role="tablist">
                @foreach ($menuCha as $key => $value)
                    <li class="nav-item">
                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                            href="#{{ $value->id }}">{{ $value->ten_danh_muc }}</a>
                    </li>
                @endforeach
            </ul>

            {{-- </div> --}}

            <!-- Tab Contetn Start -->
            <div class="tab-content">
                @foreach ($menuCha as $key => $value)
                    <div id="{{ $value->id }}" class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}">
                        <div class="electronics-pro-active owl-carousel">
                            @foreach ($allSanPham as $key_sp => $value_sp)
                                @if (in_array($value_sp->id_danh_muc, explode(',', $value->tmp)))
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="/san-pham/{{ $value_sp->slug_san_pham }}-post{{ $value_sp->id }}">
                                                <img class="primary-img" src="{{ $value_sp->anh_dai_dien }}"
                                                    alt="single-product">
                                                <img class="secondary-img" src="{{ $value_sp->anh_dai_dien }}"
                                                    alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal"
                                                data-target="#myModal" title="Quick View"><i
                                                    class="lnr lnr-magnifier"></i></a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a
                                                        href="/san-pham/{{ $value_sp->slug_san_pham }}-post{{ $value_sp->id }}">{{ $value_sp->ten_san_pham }}</a>
                                                </h4>
                                                <p><span
                                                        class="price">{{ number_format($value_sp->gia_khuyen_mai) }}</span><del
                                                        class="prev-price">{{ number_format($value_sp->gia_ban) }}</del>
                                                </p>
                                                <div class="label-product l_sale">
                                                    {{ number_format((($value_sp->gia_ban - $value_sp->gia_khuyen_mai) / $value_sp->gia_ban) * 100, 2) }}<span
                                                        class="symbol-percent">%</span></div>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a class="addToCart" data-id="{{ $value_sp->id }}">Thêm vào giỏ
                                                        hàng</a>
                                                </div>
                                                <div class="actions-secondary">

                                                    <a class="add" data-id="{{ $value_sp->id }}"><i
                                                            class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">new</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- #electronics End Here -->
            </div>
            <!-- Tab Content End -->
        </div>
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div>
