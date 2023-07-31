<?php

use App\Modules\Products\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('products', 'ProductsController@welcome');

Route::prefix('/admin/product')->group(function() {
    Route::group(["middleware" => ["auth","adminmiddleware"]], function(){
        Route::get('/list', [ProductsController::class,'index']);
        Route::get('/addproduct', [ProductsController::class,'formdata'])->name('product.add');
        Route::post('/adddata', [ProductsController::class,'getdata'])->name('product.save');
        Route::get('/destroy/{id}', [ProductsController::class,'destroy']);
        Route::get('/edit/{id}', [ProductsController::class,'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductsController::class,'update'])->name('product.update');

    });
});
