<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController as A;

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
Route::get('/ganykla', [A::class, 'index'])->name('index');

Route::get('/ganykla/create', [A::class, 'create'])->name('create');

Route::post('/ganykla', [A::class, 'store'])->name('store');

Route::get('/ganykla/edit/{animal}', [A::class, 'edit'])->name('edit');

Route::put('/ganykla/{animal}', [A::class, 'update'])->name('update');

Route::delete('/ganykla/{animal}', [A::class, 'destroy'])->name('delete');
