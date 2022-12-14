<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\EquipmentController;
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

Route::resource('buildings', BuildingController::class)->parameters([
    'buildings' => 'building:slug'
])->middleware('auth');

Route::resource('equipment', EquipmentController::class)->parameters([
    'equipment' => 'equipment:slug'
])->middleware(('auth'));

require __DIR__ . '/auth.php';
