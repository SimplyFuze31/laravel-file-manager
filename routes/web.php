<?php

use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\Folder;
use Illuminate\Support\Facades\Route;


//main page
Route::view('/', 'index');

Route::group(['middleware' => ['guest']],function(){

    Route::get('/login', [LoginController::class , 'show'])->name('login.show');
    Route::post('/login', [LoginController::class , 'login'])->name('login.perform');

});




Route::group(['middleware' => ['auth', 'permission']], function () {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LoginController::class , 'logout'])->name('logout');

    /**
     * User Routes
     */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class , 'index'])->name('users.index');
        Route::post('/create', [UserController::class , 'create'])->name('users.store');
        Route::patch('/{user}/edit', [UserController::class , 'edit'])->name('users.update');
        Route::delete('/{user}/delete', [UserController::class , 'delete'])->name('users.destroy');
    });

    Route::group(['prefix' => 'folders'], function(){

        Route::get('/', [FolderController::class , 'index'])->name('folders.index');
        Route::post('/create', [FolderController::class , 'create'])->name('folders.create');
        Route::get('/{folder}/show', [FolderController::class , 'show'])->name('folders.show');
        Route::delete('/delete/{folder}', [FolderController::class , 'delete'])->name('Folder.destroy');
        Route::get('/fileupload', [FileController::class , 'upload'])->name('files.create');
        Route::post('/filedownload', [FileController::class , 'download'])->name('files.store');
        Route::delete('/{file}/delete', [FileController::class , 'delete'])->name('file.destroy');
    });
});















//login page
// Route::view('/loginpage','login');
// //file page
// Route::get('/filepage', [FileController::class, 'index'])->name('filepage');
// //upload file
// Route::post('/filepage', [FileController::class, 'upload'])->name('upload');
// Route::get('/show', [FileController::class, 'show'])->name('show');
// //folders

// Route::get('/folder/{foldername}', 'UserController@index')->name('user');
// //create folder
// Route::post('/create-folder', [FolderController::class, 'create'])->name('createfolder');
// //delete folder
// Route::get('/delete-folder',[FolderController::class, 'delete'])->name('deletefolder');

// //loginpage

// Route::post('/login', [UserController::class, 'login'])->name("login");