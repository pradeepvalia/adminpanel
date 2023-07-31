<?php

use App\Modules\Stock\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('stock', 'StockController@welcome');
Route::prefix('/admin/stock')->group(function() {
    Route::group(["middleware" => ["auth","adminmiddleware"]], function(){
        Route::get('/list', [StockController::class,'index']);
        Route::get('/addstock', [StockController::class,'formdata'])->name('stock.add');
        Route::post('/adddata', [StockController::class,'getdata'])->name('stock.save');
        Route::get('/destroy/{id}', [StockController::class,'destroy']);
        Route::get('/edit/{id}', [StockController::class,'edit'])->name('stock.edit');
        Route::post('/update/{id}', [StockController::class,'update'])->name('stock.update');

    });
});
