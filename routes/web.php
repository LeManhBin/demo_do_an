<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomePageController::class, 'index']);
//thêm sản phẩm
Route::get('/san-pham/{id}', [\App\Http\Controllers\HomePageController::class, 'viewSanPham']);
Route::get('/danh-muc/{id}', [\App\Http\Controllers\HomePageController::class, 'viewDanhMuc']);
Route::get('/cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'index']);
Route::get('/cart/data', [\App\Http\Controllers\ChiTietDonHangController::class, 'dataCart']);
Route::post('/add-to-cart-update', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCartUpdate']);
Route::post('/remove-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'removeCart']);


Route::get('/create-bill', [\App\Http\Controllers\DonHangController::class, 'store']);
Route::post('/add-to-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCart']);

//yeu thich
Route::get('/yeuthich', [\App\Http\Controllers\YeuThichController::class, 'index']);
Route::get('/yeuthich/data', [\App\Http\Controllers\YeuThichController::class, 'dataYeuThich']);
Route::post('/add-yeu-thich-update', [\App\Http\Controllers\YeuThichController::class, 'addToLikeUpdate']);
Route::post('/remove-yeuthich', [\App\Http\Controllers\YeuThichController::class, 'removeYeuThich']);
Route::post('/add-to-like', [\App\Http\Controllers\YeuThichController::class, 'addToLike']);

//danh mục sản phẩm
Route::group(['prefix' => '/admin'], function() {
    Route::group(['prefix' => '/danh-muc-san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'store']);
        Route::get('/data', [\App\Http\Controllers\DanhMucSanPhamController::class, 'getData']);

        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'doiTrangThai']);

        Route::get('/delete/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update']);

        Route::get('/edit-form/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit_form']);
        Route::post('/update-form', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update_form']);


    });
//Sản phẩm
    Route::group(['prefix' => '/san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\SanPhamController::class, 'index']);
        Route::post('/tao-san-pham', [\App\Http\Controllers\SanPhamController::class, 'CreateSanPham']);

        Route::get('/danh-sach-san-pham', [\App\Http\Controllers\SanPhamController::class, 'DanhSachSanPham']);
        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\SanPhamController::class, 'DoiTrangThaiSanPham']);

        Route::get('/xoa-san-pham/{id}', [\App\Http\Controllers\SanPhamController::class, 'XoaSanPham']);

        Route::get('/edit/{id}', [\App\Http\Controllers\SanPhamController::class, 'editSanPham']);
        Route::post('/update', [\App\Http\Controllers\SanPhamController::class, 'updateSanPham']);

        Route::get('/search', [\App\Http\Controllers\SanPhamController::class, 'viewSearch']);

        Route::post('/search', [\App\Http\Controllers\SanPhamController::class, 'search']);
    });
//Nhập hàng
    Route::group(['prefix' => '/nhap-kho'], function() {
        Route::get('/index', [\App\Http\Controllers\KhoHangController::class, 'index']);

        Route::get('/loadData', [\App\Http\Controllers\KhoHangController::class, 'loadData']);
        Route::get('/add/{id}', [\App\Http\Controllers\KhoHangController::class, 'store']);

        Route::get('/remove/{id}', [\App\Http\Controllers\KhoHangController::class, 'destroy']);
        Route::post('/update', [\App\Http\Controllers\KhoHangController::class, 'update']);

        Route::get('/create', [\App\Http\Controllers\KhoHangController::class, 'create']);
    });

    Route::group(['prefix' => '/cau-hinh'], function() {
        Route::get('/', [\App\Http\Controllers\ConfigController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\ConfigController::class, 'store']);
    });
    //Quan ly tai khoan
    Route::group(['prefix' => '/quan-li-tai-khoan'], function() {
    Route::get('/index', [\App\Http\Controllers\QuanLiTaiKhoanController::class, 'index']);
    Route::get('/danh-sach-tai-khoan', [\App\Http\Controllers\QuanLiTaiKhoanController::class, 'ListTaiKhoan']);
    Route::get('/xoa-tai-khoan/{id}', [\App\Http\Controllers\QuanLiTaiKhoanController::class, 'XoaTaiKhoan']);
    });

});
//user
Route::group(['prefix' => '/agent'], function() {
    Route::get('/product', [\App\Http\Controllers\SanPhamController::class, 'viewProduct']);
});
Route::get('/agent/register', [\App\Http\Controllers\AgentController::class, 'register']);
Route::post('/agent/register', [\App\Http\Controllers\AgentController::class, 'registerAction']);
Route::get('/agent/login', [\App\Http\Controllers\AgentController::class, 'login']);
Route::get('/agent/login-addtocart', [\App\Http\Controllers\AgentController::class, 'login_addtocart']);
Route::get('/agent/logout', [\App\Http\Controllers\AgentController::class, 'logout']);
Route::post('/agent/login', [\App\Http\Controllers\AgentController::class, 'loginAction']);
Route::get('/active/{hash}', [\App\Http\Controllers\AgentController::class, 'active']);
//admin
Route::group(['prefix' => '/admin'], function() {
    Route::get('/dieukhien', [\App\Http\Controllers\AdminAccController::class, 'viewDieuKhien']);
});
Route::get('/admin/login', [\App\Http\Controllers\AdminAccController::class, 'login']);
Route::get('/admin/logout', [\App\Http\Controllers\AdminAccController::class, 'logout']);
Route::post('/admin/login-action', [\App\Http\Controllers\AdminAccController::class, 'loginAction']);

//Don hang
Route::group(['prefix' => '/don-hang'], function() {
Route::get('/index', [\App\Http\Controllers\QuanLiDonHangController::class, 'index']);
Route::get('/danh-sach-don-hang', [\App\Http\Controllers\QuanLiDonHangController::class, 'ListDonHang']);
Route::get('/xoa-don-hang/{id}', [\App\Http\Controllers\QuanLiDonHangController::class, 'deleteDonHang']);

});
//Forgot password

//test
Route::get('/test', [\App\Http\Controllers\TestController::class, 'test']);
Route::get('/test-phan-hoi', [\App\Http\Controllers\TestController::class, 'testphanhoi']);
