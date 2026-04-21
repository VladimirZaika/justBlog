<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('static.home');
})->name('home');;

Route::get('/about', function () {
    return view('static.about');
})->name('about');;

Route::get('/contact', function () {
    return view('static.contact');
})->name('contact');;

Route::post('/contact', function () {
    //dd(Request::all());
    return redirect('/contact')->withInput();
})->name('contact.post');