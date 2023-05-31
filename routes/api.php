<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoryController::class)
->prefix('/category')->name('category.')
->group(function() {
    Route::get('/list',         'list'      )->name('list');
    //para tratar um registro em particular é necessária informação extra (uuid). Como se trata de variável, esta fica entre chaves {}
    Route::get('/show/{uuid}',  'show'      )->name('show');
    // store usa o método post por vir de um formulário
    Route::post('/store',       'store'     )->name('store');
    // put usa o método put, é um post específico para atualização do banco
    Route::put('/put',          'put'       )->name('put');
    Route::delete('/destroy',      'destroy'   )->name('destroy');
});
// #####################
// #### Controller Product
// #####################

Route::controller(ProductController::class)
->prefix('/product')->name('product.')
->group(function() {
    Route::get('/list',         'list'      )->name('list');
    Route::get('/show/{uuid}',  'show'      )->name('show');
    // store usa o método post por vir de um formulário
    Route::post('/store',       'store'     )->name('store');
    // put usa o método put, é um post específico para atualização do banco
    Route::put('/put',          'put'       )->name('put');
    Route::post('/destroy',      'destroy'   )->name('destroy');
});

