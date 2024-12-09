<?php

use App\Http\Middleware\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProductController;

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

Route::get('/checkout', [DashboardController::class, 'checkout'])->name('checkout');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/new', [UserController::class, 'new'])->name('admin.users.new');
        Route::post('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::get('/{user}/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});

Route::prefix('instructor')->group(function () {
    Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('instructor.courses.index');
        Route::get('/new', [CourseController::class, 'new'])->name('instructor.courses.new');
        Route::post('/create', [CourseController::class, 'create'])->name('instructor.courses.create');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('instructor.courses.edit');
        Route::post('/{course}/update', [CourseController::class, 'update'])->name('instructor.courses.update');
        Route::get('/{course}/delete', [CourseController::class, 'destroy'])->name('instructor.courses.destroy');
    });
    Route::get('/orders', [InstructorController::class, 'index'])->name('instructor.orders');
});

Route::prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('vendor.products.index');
        Route::get('/new', [ProductController::class, 'new'])->name('vendor.products.new');
        Route::post('/create', [ProductController::class, 'create'])->name('vendor.products.create');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('vendor.products.edit');
        Route::post('/{product}/update', [ProductController::class, 'update'])->name('vendor.products.update');
        Route::get('/{product}/delete', [ProductController::class, 'destroy'])->name('vendor.products.destroy');
    });
    Route::get('/orders', [VendorController::class, 'index'])->name('vendor.orders');
    Route::post('/orders/{order}/refund', [VendorController::class, 'refund'])->name('vendor.orders.refund');
});
