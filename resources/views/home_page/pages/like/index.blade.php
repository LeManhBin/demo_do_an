@extends('home_page.master')
@section('content')
    <div id="app" class="cart-main-area ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Form Start -->
                    <form action="#">
                        <!-- Table Content Start -->
                        <div class="table-content table-responsive mb-45">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Sản Phẩm</th>
                                        <th class="product-name">Tên Sản Phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số Lượng</th>
                                        <th class="product-subtotal">Tổng Tiền</th>
                                        <th class="product-buy">Mua</th>
                                        <th class="product-remove">Gỡ Sản Phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, key) in listLike">
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img v-bind:src="value.anh_dai_dien"
                                                        alt="cart-image" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">@{{ value.ten_san_pham }}</a></td>
                                            <td class="product-price"><span class="amount">@{{ formatNumber(value.don_gia) }}</span>
                                            </td>
                                            <td class="product-quantity"><input v-on:change="updateRow(value)"
                                                    v-model="value.so_luong" type="number" /></td>
                                            <td class="product-subtotal">@{{ formatNumber(value.don_gia * value.so_luong) }}</td>
                                            <td class="product-buy"><a><button v-on:click="addSanPham(value)"
                                                        class="btn btn-primary">Thêm vào giỏ</button></a></td>
                                            <td class="product-remove"> <a><i v-on:click="deleteRow(value)"
                                                        class="fa fa-times" aria-hidden="true"></i></a></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                        <div class="row">
                            <!-- Cart Button Start -->
                            <div class="col-md-8 col-sm-12">
                                <div class="buttons-cart">
                                    <a href="/">Tiếp tục mua sắm</a>
                                </div>
                            </div>
                            <!-- Cart Button Start -->
                            <!-- Cart Totals Start -->

                            <!-- Cart Totals End -->
                        </div>
                        <!-- Row End -->
                    </form>
                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                listLike: [],
                tong_tien: 0,
            },
            created() {
                this.loadCart();
            },
            methods: {
                loadCart() {
                    axios
                        .get('/yeuthich/data')
                        .then((res) => {
                            this.listLike = res.data.data;
                        });
                },
                formatNumber(number) {
                    return new Intl.NumberFormat('vi-VI', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(number);
                },
                updateRow(row) {
                    axios
                        .post('/add-yeu-thich-update', row)
                        .then((res) => {
                            if (res.status) {
                                toastr.success("Đã cập nhật danh sách!");
                                this.loadCart();
                            }
                        });
                },
                deleteRow(row) {
                    axios
                        .post('/remove-yeuthich', row)
                        .then((res) => {
                            toastr.success("Đã cập nhật danh sách!");
                            this.loadCart();
                        });
                },
                addSanPham(row) {
                    axios
                        .post('/add-to-cart', row)
                        .then((res) => {
                            toastr.success("Đã thêm sản phẩm vào giỏ hàng!");
                            this.loadCart();
                        });
                },
            },
        });
    </script>
@endsection
