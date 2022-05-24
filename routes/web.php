<?php

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
    return view('home.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/utilisateur', [App\Http\Controllers\HomeController::class, 'user'])->name('utilisateur');
Route::post('/vente', [App\Http\Controllers\VenteController::class, 'store'])->name('vente');
Route::get('/utilisateur/{$id}', [App\Http\Controllers\VenteController::class, 'desactive'])->name('desactive');
