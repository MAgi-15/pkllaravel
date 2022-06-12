<?php

// use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use App\Http\Controllers\UserController;
use App\Models\User;

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


Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/tambah', [CustomerController::class, 'tambah']);
Route::post('/customer/simpan', [CustomerController::class, 'simpan']);
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit']);
Route::put('/customer/update/{id}', [CustomerController::class, 'update']);
Route::get('/customer/hapus/{id}', [CustomerController::class, 'hapus']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/simpan', [UserController::class, 'simpan']);

Route::get('/upload', [\App\Http\Controllers\API\UploadController::class, 'upload']);
Route::post('/upload/proses', [\App\Http\Controllers\API\UploadController::class, 'proses_upload']);
