<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IstanaSiakController;
use App\Http\Controllers\Auth\DaftarController;
use App\Http\Controllers\Auth\LupaPasswordController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\CulinaryController;

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

// Static Routes
Route::get('/about', function () {return view('tentang'); })->name('about');
Route::get('/contact', function () {return view('kontak'); })->name('contact');
Route::get('/verify/email/{id}', function ($id) {return view('verify_email', ['id' => $id]); })->name('verification.notice');

// IstanaSiakController Routes
Route::controller(IstanaSiakController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/submit-review', 'submitReview')->name('submit.review');
});

// HotelController Routes
Route::controller(HotelController::class)->group(function () {
    Route::get('/hotel', 'index')->name('hotels.index');
    Route::get('/hotel/{id}', 'show')->name('hotels.detail');
});

Route::controller(CulinaryController::class)->group(function () {
    Route::get('/culinary', 'index')->name('culinary.index');
    Route::get('/culinary/{id}', 'show')->name('culinary.detail');
});

// LoginController Routes
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');

});

// DaftarController Routes
Route::controller(DaftarController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register/create', 'daftar')->name('register');
    Route::get('/verify/email/{id}/resend', 'resendVerify')->name('verification.resend');
    Route::get('/verify/email/{id}/{hash}', 'verify')->middleware('signed')->name('verification.verify');
});

// LupaPasswordController Routes
Route::controller(LupaPasswordController::class)->group(function () {
    Route::get('/forgot/password', 'index')->name('password.forgot');
    Route::post('/forgot/password', 'sendResetLink')->name('password.email');
    Route::get('/reset-password/{token}', 'showResetPassword')->middleware('guest')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->middleware('guest')->name('password.update');
});

// TiketController Routes
Route::controller(TiketController::class)->group(function () {
    Route::get('/tickets', 'tiket')->name('tickets.index');
    Route::get('/tickets/{transaction:invoice_number}/detail', 'detail')->name('tickets.detail');
    Route::post('/tickets/create', 'create')->name('tickets.create');
    Route::get('/ticket/{transaction:invoice_number}/detail', 'detailTicket')->name('tickets.detail.legacy');
});

// PaymentController Routes
Route::controller(PaymentController::class)->group(function () {
    Route::post('/user/payment/callback', 'handleCallback')->name('payment.callback');
});

// ShoppingController Routes
Route::controller(ShoppingController::class)->group(function () {
    Route::get('/shopping', 'index')->name('shopping.index');

});

// Route::get('/storage-link', function () {
//     // Run artisan command
//     Artisan::call('storage:link');

//     return response()->json([
//         'message' => 'Storage link created successfully.',
//         'output'  => Artisan::output(),
//     ]);
// })->name('storage.link');


// Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
// Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
// Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
// Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
// Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
// Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
