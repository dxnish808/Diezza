<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Stock management (accessible by all authenticated users)
Route::resource('stocks', StockController::class)->middleware('auth');
Route::get('/stocks/{id}/details', [StockController::class, 'showById'])->name('stocks.byId');
Route::get('/scan-barcode', function () {
    return view('stocks.scan');
})->name('stocks.scan');


// General routes for authenticated users
Route::middleware(['auth'])->group(function () {
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// User management (restricted to admin role)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('users');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/profile/admin/edit/{id}', [UserController::class, 'edit'])->name('profile.admin.edit');
    Route::put('/profile/admin/update/{id}', [UserController::class, 'update'])->name('profile.admin.update');

    // Registration (admin only)
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

// Authentication and password reset for guests
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});

// Logout for authenticated users
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

//Vendors
Route::resource('vendors', VendorController::class);


Route::prefix('restocks')->group(function () {
    Route::get('/', [RestockController::class, 'index'])->name('restocks.index');
    Route::get('/create', [RestockController::class, 'create'])->name('restocks.create');
    Route::post('/add-item', [RestockController::class, 'addItem'])->name('restocks.addItem');
    Route::delete('/remove-item/{index}', [RestockController::class, 'removeItem'])->name('restocks.removeItem');
    Route::post('/submit', [RestockController::class, 'submitOrder'])->name('restocks.submitOrder');
    Route::delete('/group/{order_group_id}', [RestockController::class, 'destroyGroup'])->name('restocks.destroyGroup');
    Route::get('/restocks/{id}', [RestockController::class, 'show'])->name('restocks.show');
    Route::get('/restocks/verify/{order_group_id}', [RestockController::class, 'verify'])->name('restocks.verify');

});


Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/show', [ReportController::class, 'show'])->name('reports.show');

