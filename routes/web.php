<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('/about', [DashboardController::class, 'about'])->name('about');

Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');

Route::get('/shop', [DashboardController::class, 'shop'])->name('shop');

Route::get('/learn', [DashboardController::class, 'learn'])->name('learn');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/item', [DashboardController::class, 'item'])->name('item');

Route::get('/course', [DashboardController::class, 'course'])->name('course');

Route::get('/cart', [DashboardController::class, 'cart'])->name('cart');

// Authentication routes (Laravel Breeze/Jetstream)
Route::middleware(['auth'])->group(function () {
    // Item Routes
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

    // Cart Routes
    // Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    // Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');

    // Order Routes
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/orders', [OrderController::class, 'process'])->name('orders.process');
    Route::get('/orders/confirmation/{order}', [OrderController::class, 'confirmation'])->name('orders.confirmation');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // Admin Routes
    Route::middleware(['can:viewAdmin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/orders', [DashboardController::class, 'orders'])->name('admin.orders');
        Route::get('/items', [DashboardController::class, 'itemManagement'])->name('admin.items');
    });
});
