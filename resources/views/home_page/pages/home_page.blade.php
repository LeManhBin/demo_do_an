@extends('home_page.master')

@section('content')

@include('home_page.pages.compoment.slide')

@include('home_page.pages.compoment.hotdeal')

@include('home_page.pages.compoment.image')

@include('home_page.pages.compoment.new_arrivals')

@include('home_page.pages.compoment.best_seller')

{{-- @include('home_page.pages.compoment.you_may_like') --}}

@include('home_page.pages.compoment.sale')

<div class="support-area bdr-top">
    <div class="container">
        <div class="d-flex flex-wrap text-center">
            <div class="single-support">
                <div class="support-icon">
                    <i class="lnr lnr-gift"></i>
                </div>
                <div class="support-desc">
                    <h6>Ưu đãi lớn</h6>
                    {{-- <span>Nunc id ante quis tellus faucibus dictum in eget.</span> --}}
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                    <i class="lnr lnr-rocket" ></i>
                </div>
                <div class="support-desc">
                    <h6>Giao hàng toàn quốc</h6>
                    {{-- <span>Quisque posuere enim augue, in rhoncus diam dictum non</span> --}}
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                   <i class="lnr lnr-lock"></i>
                </div>
                <div class="support-desc">
                    <h6>Thanh toán an toàn</h6>
                    {{-- <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span> --}}
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                   <i class="lnr lnr-enter-down"></i>
                </div>
                <div class="support-desc">
                    <h6>Mua sắm thoải mái</h6>
                    {{-- <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span> --}}
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                   <i class="lnr lnr-users"></i>
                </div>
                <div class="support-desc">
                    <h6>Hỗ trợ 24/7</h6>
                    {{-- <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
@endsection
