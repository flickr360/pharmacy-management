<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Medicine Routes
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::get('/medicines/{medicine}', [MedicineController::class, 'show']);
Route::get('/medicines/{medicine}/edit', [MedicineController::class, 'edit']);
Route::patch('/medicines/{medicine}', [MedicineController::class, 'update']);
Route::post('/medicines', [MedicineController::class, 'store']);    




// Supplier Routes
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');

// Display a list of suppliers (index route)
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
