<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts{post:slug}', [PostController::class, 'show'])->name('posts.show');