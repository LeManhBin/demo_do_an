<div id="grid-view" class="tab-pane fade show active">
    <div class="row">
        <!-- Single Product Start -->
        @foreach ($sanPham as $key => $value)
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="/san-pham/{{ $value->slug_san_pham }}-post{{ $value->id }}">
                            <img class="primary-img" src="{{ $value->anh_dai_dien }}" alt="single-product">
                            <img class="secondary-img" src="{{ $value->anh_dai_dien }}" alt="single-product">
                        </a>
                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title=""
                            data-original-title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a
                                    href="/san-pham/{{ $value->slug_san_pham }}-post{{ $value->id }}">{{ $value->ten_san_pham }}</a>
                            </h4>
                            <p><span class="price">{{ number_format($value->gia_khuyen_mai, 0) }}</span><del
                                    class="prev-price">{{ number_format($value->gia_ban, 0) }}</del></p>
                            <div class="label-product l_sale">
                                {{ number_format((($value->gia_ban - $value->gia_khuyen_mai) / $value->gia_ban) * 100, 0) }}<span
                                    class="symbol-percent">%</span></div>

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
                </div>
            </div>
        @endforeach

        <!-- Single Product End -->

    </div>
    <!-- Row End -->
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
