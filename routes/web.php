<?php

use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
Route::middleware('auth', 'role:admin')->group(function () {
    
    Route::get('/parameters', [ParameterController::class, 'index'])->name('parameter.index');
    Route::get('/parameter', [ParameterController::class, 'edit'])->name('parameter.edit');
    Route::patch('/parameter', [ParameterController::class, 'update'])->name('parameter.update');
    Route::delete('/parameter', [ParameterController::class, 'destroy'])->name('parameter.destroy');
});

Route::get('admin', function () {
    return  "admin";
    
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
Route::get('penulis', function () {
    return  "penulis";
})->middleware(['auth', 'verified', 'role:penulis|admin'])->name('dashboard');



Route::get('tulisan', function () {
    return  view("tulisan");
})->middleware(['auth', 'verified', 'role_or_permission:lihat-tulisan|admin'])->name('dashboard');


require __DIR__.'/auth.php';
