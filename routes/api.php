<?php

use App\Http\Controllers\TenantController;
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

Route::resources([
    // 'photos' => PhotoController::class,
    // 'posts' => PostController::class,
]);

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tenant', [TenantController::class, 'index']);
