<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
Route::get('/user', [App\Http\Controllers\UserController::class, 'user']);
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/memberEdit', [App\Http\Controllers\UserController::class,'memberEdit']);
Route::get('/memberDelete/{id}', [App\Http\Controllers\UserController::class,'memberDelete']);
});

Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('detail');
Route::get('/items/edit/{item}', [App\Http\Controllers\ItemController::class, 'showEditForm'])->name('item.edit');
Route::post('/items/edit/{item}', [App\Http\Controllers\ItemController::class, 'edit']);
Route::get('/items/delete/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.delete');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    
});
