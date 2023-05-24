<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Excluir 'verified' da rota dashboard devido não possuir servidro de e-mail
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
// excluir route: /

    // Rota para Dashboard sem o 'verified'
    Route::middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'show']);
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Aqui vão as rotas criadas no projeto
Route::controller(CategoryController::class)
->prefix('/category')->name('category.')
->group(function() {
    Route::get('/list',         'list'      )->name('list');
    //para tratar um registro em particular é necessária informação extra (uuid). Como se trata de variável, esta fica entre chaves {}
    Route::get('/show/{uuid}',  'show'      )->name('show');

    Route::get('/create',       'create'    )->name('create');
    // store usa o método post por vir de um formulário
    Route::post('/store',       'store'     )->name('store');

    Route::get('/update/{uuid}','update'    )->name('update');
    // put usa o método put, é um post específico para atualização do banco
    Route::put('/put',          'put'       )->name('put');

    Route::get('/delete/{uuid}','delete'    )->name('delete');
    Route::post('/destroy',      'destroy'   )->name('destroy');
});
// #####################
// #### Controller Product
// #####################

Route::controller(ProductController::class)
->prefix('/product')->name('product.')
->group(function() {
    Route::get('/list',         'list'      )->name('list');
    Route::get('/show/{uuid}',  'show'      )->name('show');

    Route::get('/create',       'create'    )->name('create');
    // store usa o método post por vir de um formulário
    Route::post('/store',       'store'     )->name('store');

    Route::get('/update/{uuid}','update'    )->name('update');
    // put usa o método put, é um post específico para atualização do banco
    Route::put('/put',          'put'       )->name('put');

    Route::get('/delete/{uuid}','delete'    )->name('delete');
    Route::post('/destroy',      'destroy'   )->name('destroy');
    });

});

require __DIR__.'/auth.php';
