<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy']);

// Medicine Routes
Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index')->middleware('auth');
Route::get('/medicines/{medicine}', [MedicineController::class, 'show'])->middleware('auth');
Route::get('/medicines/{medicine}/edit', [MedicineController::class, 'edit'])->middleware('auth');
Route::patch('/medicines/{medicine}', [MedicineController::class, 'update'])->middleware('auth');
Route::post('/medicines', [MedicineController::class, 'store'])->middleware('auth')->name('medicines.store');

// Supplier Routes

// Display a list of suppliers (index route)
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index')->middleware('auth');

Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create')->middleware('auth');;
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store')->middleware('auth');;
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->middleware('auth');;
Route::patch('/suppliers/{supplier}', [SupplierController::class, 'update'])->middleware('auth');;
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->middleware('auth');;

//Order routes

Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create')->middleware('auth');;
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');;
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');;
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit')->middleware('auth');;
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update')->middleware('auth');;
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('auth');;
