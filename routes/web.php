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




Route::group(['middleware' => ['auth']], function () {
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

        Route::get('/{folder?}', [FolderController::class , 'index'])->name('folder.index');
        Route::post('/create', [FolderController::class , 'create'])->name('folder.create');
        Route::get('/{folder}', [FolderController::class , 'show'])->name('folder.show');
        Route::delete('/delete/{folder}', [FolderController::class , 'delete'])->name('folder.destroy');
        Route::post('/fileupload/{folder?}', [FileController::class , 'upload'])->name('file.upload');
        Route::post('/filedownload{file}', [FileController::class , 'download'])->name('file.download');
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