<?php
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//main page
Route::view('/','index');
//login page
Route::view('/loginpage','login');
//file page
Route::get('/filepage', [FileController::class, 'index'])->name('filepage');
//upload file
Route::post('/filepage', [FileController::class, 'upload'])->name('upload');
Route::get('/show', [FileController::class, 'show'])->name('show');
//folders
//create folder
Route::post('/create-folder', [FolderController::class, 'create'])->name('createfolder');
//delete folder
Route::get('/delete-folder',[FolderController::class, 'delete'])->name('deletefolder');

//loginpage

Route::post('/login', [UserController::class, 'login'])->name("login");
