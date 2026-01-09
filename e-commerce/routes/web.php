<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


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
});

Route::middleware(['auth'])->group(function () {

    Route::post('/products', function () {
        abort_unless(auth()->user()->can('products.create'), 403);
        // create product
    });

    Route::put('/products/{product}', function () {
        abort_unless(auth()->user()->can('products.update'), 403);
        // update product
    });

});

Route::middleware('auth')->group(function () {

    Route::get('/categories/{category}', 
        [CategoryController::class, 'show']
    );

    Route::patch('/categories/{category}/status', 
        [CategoryController::class, 'updateStatus']
    );
});


require __DIR__.'/auth.php';
