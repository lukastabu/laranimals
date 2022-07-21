<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController as A;
use App\Http\Controllers\FoodController as F;

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

//Ganykla
Route::get('/ganykla', [A::class, 'index'])->name('index')->middleware('rc:user');

Route::get('/ganykla/create', [A::class, 'create'])->name('create')->middleware('rc:admin');

Route::post('/ganykla', [A::class, 'store'])->name('store')->middleware('rc:admin');

Route::get('/ganykla/edit/{animal}', [A::class, 'edit'])->name('edit')->middleware('rc:admin');

Route::put('/ganykla/{animal}', [A::class, 'update'])->name('update')->middleware('rc:admin');

Route::delete('/ganykla/{animal}', [A::class, 'destroy'])->name('delete')->middleware('rc:admin');

Route::get('/ganykla/show/{id}', [A::class, 'show'])->name('show')->middleware('rc:user');


//Food
Route::get('/edalas', [F::class, 'index'])->name('food-index')->middleware('rc:user');

Route::get('/edalas/create', [F::class, 'create'])->name('food-create')->middleware('rc:admin');

Route::post('/edalas', [F::class, 'store'])->name('food-store')->middleware('rc:admin');

Route::get('/edalas/edit/{food}', [F::class, 'edit'])->name('food-edit')->middleware('rc:admin');

Route::put('/edalas/{food}', [F::class, 'update'])->name('food-update')->middleware('rc:admin');

Route::delete('/edalas/{food}', [F::class, 'destroy'])->name('food-delete')->middleware('rc:admin');

Route::get('/edalas/show/{id}', [F::class, 'show'])->name('food-show')->middleware('rc:user');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
