<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// ระบบขายสินค้า
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\CustomerController;
// ระบบจองห้องพัก
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelCustomerController;
// ระบบทะเบียนนักศึกษา
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\SearchController;
Route::get('/showdatabase', [SearchController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orderdetails', [OrderDetailController::class, 'index']);
Route::get('/customers', [CustomerController::class, 'index']);

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/roomtypes', [RoomTypeController::class, 'index']);
Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/hotel_customers', [HotelCustomerController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/registers', [RegisterController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'index']);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
