<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\LoanController;



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

//items
Route::resource('items', ItemController::class) ->middleware('auth');



//boxes 
Route::resource('boxes', BoxController::class) ->middleware('auth');

//loans
Route::resource('loans', LoanController::class) ->middleware('auth');

// ruta a controlador de loan, metodo edit pasando id
Route::get('/loans/create/{id}', 'App\Http\Controllers\LoanController@create')->name('loans.create');


Route::get('/items/search', 'App\Http\Controllers\ItemController@search')->name('items.search');




require __DIR__.'/auth.php';
