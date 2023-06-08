<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Product
use App\Http\Controllers\ProductController;

// localhosr:8000/api/
// tampilkan
Route::get('/list', [ProductController::class, 'index']);

// detail
Route::get('/detail/{id}', [ProductController::class, 'show']);

// hapus
Route::delete('/delete/{id}', [ProductController::class, 'destroy']);

// edit
Route::put('/edit/{id}', [ProductController::class, 'update']);

// tambah
Route::post('/add', [ProductController::class, 'store']);





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
