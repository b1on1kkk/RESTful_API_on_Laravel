<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# controllers
use App\Http\Controllers\PostController;
use App\Http\Controllers\GetPostController;
use App\Http\Controllers\GetPostByIdController;
use App\Http\Controllers\PutPostController;
use App\Http\Controllers\DeletePostByIdController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

# GET
Route::get('posts', [GetPostController::class, 'get']);
Route::get('posts/{id}', [GetPostByIdController::class, 'getById']);

# POST
Route::post('posts', [PostController::class, 'upload']);

# PUT
Route::put('posts/{id}', [PutPostController::class, 'change']);

# DELETE
Route::delete('posts/{id}', [DeletePostByIdController::class, 'delete']);