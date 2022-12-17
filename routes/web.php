<?php

use App\Http\Controllers\Datamd5Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\InputDataTrdController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrdrbwController;
use App\Http\Controllers\UserController;
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

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::get('/', [LoginController::class, 'create'])->name('login');
Route::post('/', [LoginController::class, 'postLogin'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [PemasukanController::class, 'index'])->name('home');
    
    //PEMASUKAN
    Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan');
    Route::post('/pemasukanpost', [PemasukanController::class, 'post'])->name('pemasukanpost');
    Route::get('/pemasukan/{pemasukan}/edit', [PemasukanController::class, 'edit'])->name('pemasukanedit');
    Route::put('/pemasukan/{pemasukan}', [PemasukanController::class, 'update'])->name('pemasukanupdate');
    Route::get('/pemasukan/{pemasukan}/delete', [PemasukanController::class, 'delete'])->name('pemasukandelete');
    
    //PENGELUARAN
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::post('/pengeluaranpost', [PengeluaranController::class, 'post'])->name('pengeluaranpost');
    Route::get('/pengeluaran/{pengeluaran}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaranedit');
    Route::put('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'update'])->name('pengeluaranupdate');
    Route::get('/pengeluaran/{pengeluaran}/delete', [PengeluaranController::class, 'delete'])->name('pengeluarandelete');

    //USER
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/userpost', [UserController::class, 'post'])->name('userpost');
});


