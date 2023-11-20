<?php

use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/post', function () {
    return Inertia::render('Posts/PostComponent', []);
});
Route::get('/new', function () {
    return Inertia::render('Posts/NewComponent', []);
});
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
    Route::get('/parameters', [ParameterController::class, 'index'])->name('parameters');
    Route::get('/parameters/create', [ParameterController::class, 'create'])->name('parameters.create');
     Route::get('/parameters/{parameter}/edit', [ParameterController::class, 'edit'])->name('parameters.edit');
     Route::put('/parameters/{parameter}', [ParameterController::class, 'update'])->name('parameters.update');
    Route::delete('/parameters/{parameter}', [ParameterController::class, 'destroy'])->name('parameters.destroy');
    Route::post('/parameters/', [ParameterController::class, 'store'])->name('parameters.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
