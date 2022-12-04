<?php

use App\Http\Controllers\admin\CarController as AdminCarController;
use App\Http\Controllers\user\CarController as UserCarController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// uses the cars index as the homepage
Route::resource('/cars', CarController::class)->middleware(['auth']);

// Route::get('/cars',);

// Route::get('/cars/{car}', );

// Route::get('/cars/create',);

// Route::post('/cars',);





require __DIR__.'/auth.php';

Route::resource('/admin/cars', AdminCarController::class)->middleware(['auth'])->names('admin.cars');

Route::resource('/user/cars', UserCarController::class)->middleware(['auth'])->names('user.cars')->only(['index', 'show']);

