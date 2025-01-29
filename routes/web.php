<?php

use App\Http\Controllers\{ProfileController, CarController, AdminController,
    MarkController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/cars/{mark?}', [CarController::class, 'index'])->name('cars.index');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/cars', 'cars')->name('admin.cars');
    Route::get('/admin/marks', 'marks')->name('admin.marks');
});

Route::controller(MarkController::class)->group(function () {
    Route::post('/mark/upload', 'upload')->name('mark.upload');
    Route::delete('/mark/delete/{id}', 'delete')->name('mark.delete');
    Route::put('/mark/restore/{id}', 'restore')->name('mark.restore');
});

require __DIR__.'/auth.php';
