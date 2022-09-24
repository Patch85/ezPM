<?php

use App\Http\Controllers\BuildingController;
use Illuminate\Routing\RouteGroup;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Buildings
Route::middleware('auth')->group(function () {
    Route::get('/buildings', [BuildingController::class, 'index'])->name('buildings.index');

    Route::get('/buildings/new', [BuildingController::class, 'create'])->name('buildings.create');

    Route::post('/buildings/new', [BuildingController::class, 'store'])->name('buildings.store');

    Route::get('/buildings/{building:building_number}', [BuildingController::class, 'show'])->name('buildings.show');

    Route::get('/buildings/{building:building_number}/edit', [BuildingController::class, 'edit'])->name('buildings.edit');

    Route::put('/buildings/{building:building_number}/edit', [BuildingController::class, 'update'])->name('buildings.update');
});

require __DIR__ . '/auth.php';
