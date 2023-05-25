<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/filepage', [FileController::class, 'index'])->name('filepage');
Route::post('/filepage', [FileController::class, 'store'])->name('upload');
Route::get('/show', [FileController::class, 'show'])->name('show');
