<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/landing', function() {
    return view('landing'); // The landing page after login
})->name('landing')->middleware('auth'); // Ensure this route is protected by auth middleware

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Auth
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
