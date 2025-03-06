<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\clients\IndexController;
use App\Http\Controllers\clients\AboutController;
use App\Http\Controllers\clients\ContactController;
use App\Http\Controllers\clients\DestinationController;
use App\Http\Controllers\clients\ServicesController;
use App\Http\Controllers\clients\TestimonialController;
use App\Http\Controllers\clients\TourController;
use App\Http\Controllers\clients\TourDetailController;
use App\Http\Controllers\clients\TravelGuidesController;
use App\Http\Controllers\clients\BookingController;
use App\Http\Controllers\clients\SearchController;
use App\Http\Controllers\clients\CheckOutController;
use App\Http\Controllers\clients\MyTourController;
use App\Http\Controllers\clients\AccountController;
// auth
use App\Http\Controllers\auth\AuthController;

// admin
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\GalleriesController;
use App\Http\Controllers\admin\ToursController;
use App\Http\Controllers\admin\BookingsController;
use App\Http\Controllers\admin\NewController;
use App\Http\Controllers\admin\TimeLinesController;
use App\Http\Controllers\clients\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [IndexController::class , 'index'])->name('home');
Route::get('/about', [AboutController::class , 'index'])->name('about');
Route::get('/contact', [ContactController::class , 'index'])->name('contact');
Route::get('/destination', [DestinationController::class , 'index'])->name('destination');
Route::get('/service', [ServicesController::class , 'index'])->name('service');
Route::get('/testimonial', [TestimonialController::class , 'index'])->name('testimonial');
Route::get('/tour', [TourController::class , 'index'])->name('tour');
Route::get('/tour-cate/{id}', [TourController::class , 'tourCate'])->name('tour_cate');
Route::get('/tour-detail/{id}', [TourDetailController::class , 'index'])->name('tour_detail');
Route::get('/travel-guides', [TravelGuidesController::class , 'index'])->name('travel_guides');


Route::get('/my-tour', [MyTourController::class , 'index'])->name('my_tour');
Route::get('/tour-booked/{id}', [MyTourController::class , 'tour_booked'])->name('tour_booked');
Route::post('/cancel-booking/{id}', [MyTourController::class , 'cancel_booking'])->name('cancel_booking');
Route::post('/insert-review/{id}', [MyTourController::class , 'insert_review'])->name('insert_review');

Route::get('/search-tours', [SearchController::class, 'search'])->name('search');

Route::post('/booking/{id}', [BookingController::class , 'index'])->name('booking');
Route::post('/submit-booking/{id}', [BookingController::class , 'booking'])->name('submit_booking');

Route::get('/new', [ArticleController::class , 'index'])->name('new');
Route::get('/new-detail/{id}', [ArticleController::class , 'new_detail'])->name('new_detail');


Route::get('/loginn', [AuthController::class , 'login'])->name('loginn');
Route::post('/loginn', [AuthController::class , 'loginPost']);
Route::get('/sign_up', [AuthController::class , 'sign_up'])->name('sign_up');
Route::post('/sign_up', [AuthController::class , 'signUpPost']);
Route::get('/actived/{customer}/{token}', [AuthController::class , 'actived'])->name('active_account');
Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

//login with gg
Route::controller(AuthController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/info', [AccountController::class , 'index'])->name('info');
Route::post('/info', [AccountController::class , 'update_user'])->name('update_user');
Route::post('/update_avata', [AccountController::class , 'update_avata'])->name('update_avata');


// admin
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('categories.index'); // Chuyển hướng đến trang danh mục
    });
    // Categories
    Route::resource('categories', CategoriesController::class);
    
    // Tours
    Route::resource('tours', ToursController::class);
    
    // Galleries
    Route::resource('galleries', GalleriesController::class);

    // Timelines
    Route::resource('timelines', TimeLinesController::class);
    
    // booking
    Route::resource('bookings', BookingsController::class);
    Route::post('/booking-update/{id}', [BookingsController::class , 'update'])->name('update_booking');

     // news
     Route::resource('news', NewController::class);
});

