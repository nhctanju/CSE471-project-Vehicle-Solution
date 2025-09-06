<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\DriverRegisterController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\DriverLoginController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\Auth\DriverAssignmentController;

use App\Http\Controllers\Auth\ReviewController;
use App\Http\Controllers\Auth\PaymentController;

Route::get('/', function () {
    return view('landing');
});

// Fallback login route for Laravel auth middleware
Route::get('/login', function () {
    return redirect()->route('customer.login.form');
})->name('login');

// Customer registration and login routes
Route::prefix('customer')->group(function () {
    Route::get('/register', function () {
        return view('customer.register');
    })->name('customer.register.form');

    Route::get('/login', function () {
        return view('customer.login');
    })->name('customer.login.form');

    Route::post('/register', [CustomerRegisterController::class, 'register'])->name('customer.register');
    Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login');
    Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout')->middleware('auth:customer');
});

// Driver registration and login routes
Route::prefix('driver')->group(function () {
    Route::get('/register', function () {
        return view('driver.register');
    })->name('driver.register.form'); // renamed route name here

    Route::get('/login', function () {
        return view('driver.login');
    })->name('driver.login.form');  // renamed route name here

    Route::post('/register', [DriverRegisterController::class, 'register'])->name('driver.register');
    Route::post('/login', [DriverLoginController::class, 'login'])->name('driver.login');
    Route::post('/logout', [DriverLoginController::class, 'logout'])->name('driver.logout')->middleware('auth:driver');
});

// Protected routes for authenticated customers
Route::middleware('auth:customer')->group(function () {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');

    // Existing service request routes
    Route::get('/service-requests/create', [ServiceRequestController::class, 'create'])->name('service_requests.create');
    Route::post('/service-requests', [ServiceRequestController::class, 'store'])->name('service_requests.store');

    // Review routes
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Wait time display route
    Route::get('/service-requests/{id}/wait-time', [ServiceRequestController::class, 'showWaitTime'])->name('service_requests.wait_time');
    Route::post('/service-requests/{id}/cancel', [ServiceRequestController::class, 'cancel'])->name('service_requests.cancel');
    Route::get('/driver-assignments/create', [DriverAssignmentController::class, 'create'])->name('driver-assignments.create');
    Route::post('/driver-assignments', [DriverAssignmentController::class, 'store'])->name('driver-assignments.store');
    
    // Payment routes
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{id}/invoice', [PaymentController::class, 'downloadInvoice'])->name('payments.invoice');
    Route::get('/payments/info', [PaymentController::class, 'info'])->name('payments.info');
});

// Protected routes for authenticated drivers
Route::middleware(['auth:driver'])->group(function () {
    Route::get('/driver/dashboard', [DriverDashboardController::class, 'showDashboard'])
        ->name('driver.dashboard');

    // Driver assignment routes
    Route::post('/driver-assignments/{assignment}/accept', [DriverAssignmentController::class, 'accept'])->name('driver-assignments.accept')->middleware('auth:driver');
    Route::post('/driver-assignments/{assignment}/decline', [DriverAssignmentController::class, 'decline'])->name('driver-assignments.decline')->middleware('auth:driver');

    Route::get('/driver/assignments', [DriverDashboardController::class, 'assignments'])->name('driver.assignments');
});

Route::get('/service-requests/{id}', [ServiceRequestController::class, 'show'])->name('service_requests.centre');
