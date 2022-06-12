<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get(
    '/customer',
    [
        App\Http\Controllers\API\CustomerController::class,
        'getAllCustomer'
    ]
);

Route::get(
    '/customer/{id}',
    [
        App\Http\Controllers\API\CustomerController::class,
        'getCustomerbyId'
    ]
);

Route::prefix('customer')->group(function () {
    Route::post(
        '/create',
        [
            App\Http\Controllers\API\CustomerController::class,
            'create'
        ]
    );
    Route::post('/read', [\App\Http\Controllers\API\CustomerController::class, 'read']);
    Route::post('/update/{id}', [\App\Http\Controllers\API\CustomerController::class, 'update']);
});

Route::prefix('user')->group(function () {
    Route::post(
        '/create',
        [
            App\Http\Controllers\API\UserController::class,
            'create'
        ]
    );
    Route::post(
        '/login',
        [
            App\Http\Controllers\API\UserController::class,
            'login'
        ]
    );
    Route::post(
        '/register',
        [
            App\Http\Controllers\API\UserController::class,
            'register'
        ]
    );
});

Route::prefix('uploadThread')->group(function () {
    Route::post(
        '/upload',
        [
            App\Http\Controllers\API\UploadthreadController::class,
            'newThread'
        ]
    );
    Route::get(
        '/thread',
        [
            App\Http\Controllers\API\UploadThreadController::class,
            'readThread'
        ]
    );
    Route::get(
        '/threadbyUser/{User}',
        [
            App\Http\Controllers\API\UploadThreadController::class,
            'getThreadbyUser'
        ]
    );
});

Route::prefix('comment')->group(function () {
    Route::get(
        '/tambahcomment/{id}',
        [
            App\Http\Controllers\API\CommentController::class,
            'getCommentbyId'
        ]
    );
    Route::post(
        '/tambahcommentlagi',
        [
            App\Http\Controllers\API\CommentController::class,
            'createComment'
        ]
    );
});

Route::prefix('like')->group(function () {
    Route::get(
        '/tambahlike/{id}',
        [
            App\Http\Controllers\API\LikeController::class,
            'getLikebyId'
        ]
    );
    Route::post(
        '/likelagi',
        [
            App\Http\Controllers\API\LikeController::class,
            'createLike'
        ]
    );
});
