<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/admin', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{post:id}', [PostController::class, 'show'])->name('admin.posts.show');

Route::get('/admin/posts/{post:id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/{post:id}/edit', [PostController::class, 'update'])->name('admin.posts.update');

Route::get('/admin/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/create', [PostController::class, 'store'])->name('admin.posts.store');
