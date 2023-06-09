<?php

use App\Http\Controllers\AdminHotelController;
use App\Http\Controllers\Clients\ChartController;
use App\Http\Controllers\Clients\IndexController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoaiGiuongController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OnlineCheckoutController;
use App\Http\Controllers\PhuonngXaController;
use App\Http\Controllers\QuanHuyenController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ThanhPhoController;
use App\Http\Controllers\TienichHotelController;
use App\Http\Controllers\TienichRoomtypeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CheckRequired;
use App\Http\livewire\District;
use App\Models\hotel;
use Illuminate\Routing\RouteAction;
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


// Admin - temple

// Route::get('/tables', function () {
//     return view('admin.layout.tables');
// })->name('tables');
Route::get('/billing', function () {
    return view('admin.layout.billing');
})->name('billing');
Route::get('/profile', function () {
    return view('admin.layout.profile');
})->name('profile');


// Ajax lấy địa chỉ
Route::get('finCity', [HotelController::class,'finCity'])->name('finCity');
Route::get('finDistrict', [HotelController::class,'finDistrict'])->name('finDistrict');


Route::get('/login',[LoginController::class,'ShowFormLogIn'])->name('login');
Route::post('/login',[LoginController::class,'Login']);
Route::post('/logout',[LoginController::class,'Logout'])->name('Logout');

Route::get('/Register',[LoginController::class,'ShowFormRegister'])->name('Register');
Route::post('/Register',[LoginController::class,'Register']);

//Client
Route::get('/',[IndexController::class,'Home'])->name('home');
Route::get('/lien_he',[IndexController::class,'lienHe'])->name('lienHe');
// Lấy danh sách khách sạn theo lựa chọn


//Hiển thị trang booking
Route::get('booking/detail/{id}',[IndexController::class,'GetHotelById'])->name('GetHotelyId');
Route::post('payment',[IndexController::class,'postBookingRoom'])->name('postBookingRoom');

// Route::middleware('auth')-> group(function(){
    Route::post('/search',[IndexController::class,'Selected'])->name('selected');
    Route::get('booking/{hotels}',[IndexController::class,'GetSelected'])->name('GetSelected');

// });

Route::get('finAddress', [IndexController::class,'finAddress'])->name('finAddress');

//Route::get('/checkSelectAPI',[IndexController::class,'checkSelectAPI'])->name('checkSelectAPI');

//Trang admin
Route::middleware('admin')->group(function(){

    Route::get('/dashboard', function(){
        return view('admin.tables.dashboard');
    })->name('dashboard');

    Route::get('/admin/hotel', [HotelController::class, 'index'])->name('admin-hotel');
    Route::get('/admin/roomtype', [RoomtypeController::class, 'index'])->name('admin-roomtype');
    Route::get('/admin/address', [QuanHuyenController::class, 'index'])->name('admin-address');
    Route::get('/admin/profile', [UserController::class, 'index'])->name('admin-profile');
    Route::get('/admin', function(){
        return view('admin.tables.dashboard');
    })->name('dashboard');

    // Route::get('/tables',[TableController::class,'Tables'])->name('tables');
    Route::resource('hotels', HotelController::class);


    Route::resource('servicerooms', TienichRoomtypeController::class);
    Route::resource('roomtypes', RoomtypeController::class);
    Route::resource('servicehotels', TienichHotelController::class);
    Route::resource('images',ImageController::class);
    Route::resource('phuongxas',PhuonngXaController::class);
    Route::resource('quanhuyens',QuanHuyenController::class);
    Route::resource('bedtypes', LoaiGiuongController::class);

    Route::get('/image/hotel/{id}',[ImageController::class,'createImageHotel']);
    Route::get('/image/roomtype/{id}',[ImageController::class,'createImageRoom']);
});

Route::get('/getRoomtypeAPI',[IndexController::class,'getRoomtypeAPI'])->name('getRoomtypeAPI');

Route::post('/paymentvnpay',[App\Http\Controllers\Clients\OnlineCheckoutController::class,'paymentvnpay'])->name('paymentvnpay');

//Liên hệ
Route::post('gui-phan-hoi', [ChartController::class, 'postFeedback'])->name('postFeedback');

Route::post('huy-dat-phong', [ChartController::class, 'postCancelReservation'])->name('postCancelReservation');

// Route::post('tra-cuu-hoa-don', [ChartController::class, 'postTraCuuHD'])->name('postTraCuuHD');

Route::match(['get', 'post'], '/tra-cuu-hoa-don/{mahd?}/{sdt?}/{CCCD?}', [ChartController::class, 'postTraCuuHD'])->name('postTraCuuHD');


Route::get('admin/billing/cancel-reservation', [ChartController::class, 'getAllCancelReservation'])->name('getAllCancelReservation');
Route::get('admin/billing/feedback', [ChartController::class, 'getAllFeedback'])->name('getAllFeedback');
Route::get('admin/billing/bill', [ChartController::class, 'getAllBill'])->name('getAllBill');
Route::get('admin/billing/detail-booking/{id}',[IndexController::class, 'detailBooking']);






//Admin khách sạn
Route::get('/admin-hotel/{hotel?}', function() {
    return view("adminHotel.master");
});

Route::get('/admin-hotel/biiling/{hotel_id?}',[AdminHotelController::class, 'showAllBilling'])->name('show-all-billing');
Route::get('/admin-hotel/roomtype/{hotel_id?}',[AdminHotelController::class, 'showRoomtype'])->name('show-all-roomtype');
Route::get('/admin-hotel/hotel/{hotel_id?}',[AdminHotelController::class, 'showHotel'])->name('show-all-hotel');







