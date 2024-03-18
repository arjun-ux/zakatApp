<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\PenampungController;
use Illuminate\Support\Facades\Route;

Route::get('/unauthorized-page', function () {
    return view('unauthorized-page');
})->name('unauthorized-page');
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('role:admin,user')->group(function(){
    Route::get('/dashboard', [DashboarController::class, 'index'])->name('dashboard');

});
Route::middleware('role:admin')->group(function(){
    // penampung
    Route::get('/penampung', [PenampungController::class, 'index'])->name('penampung.index');
    Route::post('/penampung', [PenampungController::class, 'store'])->name('penampung.store');
    Route::get('/penampung/{id}/edit', [PenampungController::class, 'edit'])->name('penampung.edit');
    Route::post('/penampung/{id}/update', [PenampungController::class, 'update'])->name('penampung.update');
    Route::delete('penampung/{id}', [PenampungController::class, 'delete'])->name('penampung.delete');
    // user
    Route::get('/user', [AuthController::class, 'userIndex'])->name('userIndex');
    Route::post('/user', [AuthController::class, 'doRegister'])->name('user.register');
    Route::get('/user/{id}/edit', [AuthController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}/update', [AuthController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [AuthController::class, 'delete'])->name('user.delete');
});
