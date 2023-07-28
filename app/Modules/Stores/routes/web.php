<?php

use App\Modules\Stores\Http\Controllers\StoresController;
use Illuminate\Support\Facades\Route;

Route::get('stores', 'StoresController@welcome');

Route::prefix('/admin/stores')->group(function() {
    Route::group(["middleware" => ["auth","adminmiddleware"]], function(){
        Route::get('/list', [StoresController::class,'index']);
        Route::get('/addstore', [StoresController::class,'formdata'])->name('stores.add');
        Route::post('/adddata', [StoresController::class,'getdata'])->name('stores.save');
        Route::get('/destroy/{id}', [StoresController::class,'destroy']);
        Route::get('/edit/{id}', [StoresController::class,'edit'])->name('stores.edit');
        Route::post('/update/{id}', [StoresController::class,'update'])->name('stores.update');

    });
});
