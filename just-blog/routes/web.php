<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/posts/{post:id}', [PostController::class, 'show'])->name('admin.posts.show');
Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/create', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('/posts/{post:id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::post('/posts/{post:id}/edit', [PostController::class, 'update'])->name('admin.posts.update');