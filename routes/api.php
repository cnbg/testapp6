<?php

use App\Http\API\AuthController;
use App\Http\API\CommentController;
use App\Http\API\PostController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('me', [AuthController::class, 'me']);

    Route::post('posts/{post}/upvote', [PostController::class, 'upvote']);
    Route::apiResource('posts', PostController::class);

    Route::apiResource('posts.comments', CommentController::class);
});
