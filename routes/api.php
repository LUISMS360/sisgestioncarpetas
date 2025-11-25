<?php

use App\Http\Controllers\CarpetaController;
use App\Http\Controllers\FutController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//RUTAS PARA ESTUDIANTES 
Route::controller(UserController::class)->group(function (){
    Route::get('/index','index')->name('users.index');
    Route::get('/show/{id}','show')->name('users.show');
    Route::post('/store','store')->name('users.store');
    Route::post('/verify/user','verify')->name('users.verify');
});

//Mensaje
//RUTAS PARA FUTS
Route::controller(FutController::class)->group(function () {
    Route::post('/fut/store','store')->name('futs.store');
    Route::get('/fut/search','show')->name('futs.show');
});


//RUTAS PARA CARPETAS
Route::controller(CarpetaController::class)->group(function () {
    Route::post('/carpeta/create','store');
    Route::post('/carpeta/add-info/hoja-aceptacion','addAceptacion');
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
