<?php

use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;






Route::get('/', [IndexController::class, 'index'])->name('index');

// rooute list mobil
Route::get('/mobil/list', [MobilController::class, 'index'])->name('mobil.list');

//  rooute list motor
Route::get('/motor/list', [MotorController::class, 'index'])->name('motor.list');


//  rooute list vocher
Route::get('/voucher/list', [VoucherController::class, 'index'])->name('voucher.list');

// rooute list car pool
Route::get('/carpool/list', [CarpoolController::class, 'index'])->name('carpool.list');

// route blog
Route::get('/blog', function () {
    return view('blog');
});



//route tambah data mitra
Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');