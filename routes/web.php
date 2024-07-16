<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::middleware(['auth','verified'])->group(function (){
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::post('profile',[UserController::class,'profile'])->name('profile');
Route::get('profile',[UserController::class,'profile'])->name('profile');
Route::put('profile',[UserController::class,'profile'])->name('profile');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::middleware('guest')->group(function (){
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('user.store');

    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::middleware('auth')->group(function (){
    Route::get('/verify-email', function () {
        return view('user.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:3,1')->name('verification.send');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/access-denied', function () {
        return 'Access Denied';
    })->name('access.denied');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('dashboard/categories', [DashboardController::class, 'storeCategory'])->name('categories.store');
    Route::delete('dashboard/categories/{id}', [DashboardController::class, 'deleteCategory'])->name('categories.delete');
    Route::get('/dashboard/products', [DashboardController::class, 'products'])->name('dashboard.products');
    Route::post('/dashboard/products', [DashboardController::class, 'storeProduct'])->name('products.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store.custom'); // Используем уникальное имя для этого маршрута
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/category/{id}', [CatalogController::class, 'category'])->name('catalog.category');
