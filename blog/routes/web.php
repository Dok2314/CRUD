<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers AS C;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'posts', 'as' => 'post.', 'middleware' => 'auth'], function (){
    Route::get('/', [C\PostsController::class, 'create'])
        ->name('create');
    Route::post('/', [C\PostsController::class, 'store'])
        ->name('create');
    Route::get('/index', [C\PostsController::class, 'index'])
        ->name('index');

    Route::group(['prefix' => '{post}'], function (){
        Route::get('edit', [C\PostsController::class, 'edit'])
            ->name('edit');
        Route::put('edit', [C\PostsController::class, 'update'])
            ->name('update');
        Route::delete('delete', [C\PostsController::class, 'destroy'])
            ->name('delete');
    });
});
