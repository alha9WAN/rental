<?php

use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;






Route::get('/', [IndexController::class, 'index'])->name('index');

// rooute list mobil
Route::get('/mobil/list/{kategori?}', [MobilController::class, 'index'])
    ->name('mobil.list')
    ->defaults('kategori', 'all');

//  rooute list motor
Route::get('/motor/list/{kategori?}', [MotorController::class, 'index'])->name('motor.list')->defaults('kategori', 'all');


//  rooute list vocher
Route::get('/voucher/list', [VoucherController::class, 'index'])->name('voucher.list');

// rooute list car pool
Route::get('/carpool/list', [CarpoolController::class, 'index'])->name('carpool.list');

// route blog
Route::get('/blog', function () {
    return view('blog.blog');
});


// route Detail blog 1
Route::get('/blog/7 Essential Tips for Choosing the Perfect Rental Car', function () {
    return view('blog.detailblog');
})->name('blog1');

// route Detail blog 2
Route::get('/blog/How to Maintain Rental Cars for Optimal Performance', function () {
    return view('blog.detailblog2');
})->name('blog2');

// route Detail blog
Route::get('/blog/5 Best Road Trip Destinations in Indonesia', function () {
    return view('blog.detailblog3');
})->name('blog3');




//route tambah data mitra
Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');

// rooute proses tambah data
Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');

// route emegancy
// STEP 1 – Form data awal
// halaman tambah data
Route::get('/emergency/step1', [EmergencyController::class, 'create'])->name('emergency.step1');
// halaman proses tambah data
Route::post('/emergency/step1', [EmergencyController::class, 'store'])->name('emergency.step1.store');


// STEP 2 – Upload foto (perbaiki route)
Route::get('/emergency/step2/{id}', [EmergencyController::class, 'showStep2'])
    ->name('emergency.step2');

    // route tabah data foto dan biaya
 Route::post('/emergency/submit-payment/{id}', [EmergencyController::class, 'submitPayment'])
    ->name('emergency.submitPayment');


// STEP 3 – Review / Selesai

Route::get('/emergency/step3/{id}', [EmergencyController::class, 'step3'])
    ->name('emergency.step3');