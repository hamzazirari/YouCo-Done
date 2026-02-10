<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/restaurants/search', [RestaurantController::class, 'search'])->name('restaurants.search');
    Route::get('/restaurants/browse', [RestaurantController::class, 'browse'])->name('restaurants.browse'); 
    
        Route::post('/favorites/{restaurant}', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');
        Route::get('/mes-favoris', [FavoriteController::class, 'index'])->name('favorites.index');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/restaurants', [AdminController::class, 'restaurants'])->name('admin.restaurants');
    Route::post('/admin/restaurants/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('admin.toggleStatus');

    Route::get('/reservations/create/{restaurant}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    Route::resource('restaurants', RestaurantController::class);
});


require __DIR__.'/auth.php';
