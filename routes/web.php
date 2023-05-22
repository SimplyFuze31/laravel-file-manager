<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts');
});
Route::get('/filepage', [FileController::class, 'index'])->name('filepage');
Route::post('/filepage', [FileController::class, 'store'])->name('upload');