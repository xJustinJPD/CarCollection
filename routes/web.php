<?php

use App\Http\Controllers\admin\CarController as AdminCarController;
use App\Http\Controllers\user\CarController as UserCarController;
use App\Http\Controllers\user\ManufacturerController as UserManufacturerController;
use App\Http\Controllers\admin\ManufacturerController as AdminManufacturerController;
use App\Http\Controllers\user\OwnerController as UserOwnerController;
use App\Http\Controllers\admin\OwnerController as AdminOwnerController;
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
// Route::resource('/cars', CarController::class)->middleware(['auth']);

// Route::get('/cars',);

// Route::get('/cars/{car}', );

// Route::get('/cars/create',);

// Route::post('/cars',);





require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/home/manufacturers', [App\Http\Controllers\HomeController::class, 'manufacturerIndex'])->name('home.manufacturer.index');

Route::get('/home/owners', [App\Http\Controllers\HomeController::class, 'ownerIndex'])->name('home.owner.index');

Route::resource('/admin/cars', AdminCarController::class)->middleware(['auth'])->names('admin.cars');

Route::resource('/user/cars', UserCarController::class)->middleware(['auth'])->names('user.cars')->only(['index', 'show']);

Route::resource('/admin/manufacturers', AdminManufacturerController::class)->middleware(['auth'])->names('admin.manufacturers');

Route::resource('/user/manufacturers',UserManufacturerController::class)->middleware(['auth'])->names('user.manufacturers')->only(['index', 'show']);

Route::resource('/admin/owners', AdminOwnerController::class)->middleware(['auth'])->names('admin.owners');

Route::resource('/user/owners',UserOwnerController::class)->middleware(['auth'])->names('user.owners')->only(['index', 'show']);