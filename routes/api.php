<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostagemController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List posts
Route::get('postagens', [PostagemController::class, 'index']);

// List single post
Route::get('postagem/{id}', [PostagemController::class, 'show']);

// Create new post
Route::post('postagem', [PostagemController::class, 'store']);

// Update post
Route::put('postagem/{id}', [PostagemController::class, 'update']);

// Delete post
Route::delete('postagem/{id}', [PostagemController::class, 'destroy']);
