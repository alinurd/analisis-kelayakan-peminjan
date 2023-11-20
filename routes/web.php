<?php

use App\Models\Modules; 
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// dd($modules);  

// Fetch the modules
$modules = Modules::all();

// Loop through the modules and define routes
Route::middleware('auth')->group(function () use ($modules) {
    foreach ($modules as $mdl) {
        // Use the string directly without ::class
        $controllerClass = 'App\\Http\\Controllers\\' . $mdl['controller'];

        // Define routes
        Route::get('/' . $mdl['route'], [$controllerClass, 'index'])->name($mdl['route']);
        Route::get('/' . $mdl['route'] . '/create', [$controllerClass, 'create'])->name($mdl['route'] . '.create');
        Route::get('/' . $mdl['route'] . '/{data}/edit', [$controllerClass, 'edit'])->name($mdl['route'] . '.edit');
        Route::put('/' . $mdl['route'] . '/{data}', [$controllerClass, 'update'])->name($mdl['route'] . '.update');
        Route::delete('/' . $mdl['route'] . '/{data}', [$controllerClass, 'destroy'])->name($mdl['route'] . '.destroy');
        Route::post('/' . $mdl['route'], [$controllerClass, 'store'])->name($mdl['route'] . 'store');
    }
});


 
 /*
 foreach ($modules as $mdl) {
        // Use the string directly without ::class
        $controllerClass = 'App\\Http\\Controllers\\' . $mdl['controller'];

        // Define routes
        Route::get('/' . $mdl['route'], [$controllerClass, 'index'])
        ->name($mdl['route'])
        ->middleware('can:view,' . $controllerClass); // Adjust this line based on your permission logic

        Route::get('/' . $mdl['route'] . '/create', [$controllerClass, 'create'])
        ->name($mdl['route'] . '.create')
            ->middleware('can:create,' . $controllerClass);

        Route::get('/' . $mdl['route'] . '/{data}/edit', [$controllerClass, 'edit'])
        ->name($mdl['route'] . '.edit')
        ->middleware('can:edit,' . $controllerClass);

        Route::put('/' . $mdl['route'] . '/{data}', [$controllerClass, 'update'])
        ->name($mdl['route'] . '.update')
            ->middleware('can:update,' . $controllerClass);

        Route::delete('/' . $mdl['route'] . '/{data}', [$controllerClass, 'destroy'])
        ->name($mdl['route'] . '.destroy')
            ->middleware('can:destroy,' . $controllerClass);

        Route::post('/' . $mdl['route'], [$controllerClass, 'store'])
        ->name($mdl['route'] . 'store')
        ->middleware('can:store,' . $controllerClass);
    }
    
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



Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__ . '/auth.php';
