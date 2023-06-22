<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\RepliesController;
use App\Http\Controllers\Api\ThreadsController;
use Illuminate\Support\Facades\Route;

Route::post('categories', [CategoriesController::class, 'store']);
Route::post('threads', [ThreadsController::class, 'store']);
Route::post('posts', [PostsController::class, 'store']);
Route::post('replies', [RepliesController::class, 'store']);
