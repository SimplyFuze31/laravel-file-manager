<?php

use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Models\Folder;
use Illuminate\Support\Facades\Route;


//main page
Route::view('/', 'index');

Route::group(['middleware' => ['guests']], function () {

    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
});


Route::group(['middleware' => ['auth', 'permission']], function () {
    /**
     * Logout Routes
     */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    /**
     * User Routes
     */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@index')->name('users.index');
        Route::post('/create', 'UsersController@store')->name('users.store');
        Route::get('/{user}/show', 'UsersController@show')->name('users.show');
        Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
        Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
        Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
    });

    Route::group(['prefix' => 'folders'], function(){

        Route::get('/', 'FolderController@index')->name('folders.index');
        Route::post('/create', 'FolderController@store')->name('folders.store');
        Route::get('/{folder}/show', 'FolderController@show')->name('folders.show');
        Route::delete('/{folder}/delete', 'FolderController@destroy')->name('Folder.destroy');
        Route::get('/filecreate', 'FileController@create')->name('files.create');
        Route::post('/filecreate', 'FileController@store')->name('files.store');
        Route::delete('/{file}/delete', 'FileController@destroy')->name('file.destroy');
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