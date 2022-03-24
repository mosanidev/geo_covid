<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndividuController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LokasiKarantinaController;
use Illuminate\Http\Request; 

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::post('action_individu', [IndividuController::class, 'action'])->name('action_individu');

Route::post('action_karantina', [LokasiKarantinaController::class, 'action'])->name('action_karantina');

Route::get('view_detail/{id}', [IndividuController::class, 'view_detail'])->name('view_detail/{id}');

Route::get('info', [KomentarController::class, 'read'])->name('info');

Route::post('insert_komen', [KomentarController::class, 'insert'])->name('insert_komen');

// Route::group(['middleware' => 'auth'], function () {
 
//     Route::get('home', [HomeController::class, 'index'])->name('home');
//     Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
// });
