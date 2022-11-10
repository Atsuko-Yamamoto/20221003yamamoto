<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

//一覧画面の表示
Route::get('/home', [TodoController::class, 'index'])->name('todo.index');
//検索画面の表示
Route::get('/find', [TodoController::class, 'find'])->name('todo.find');
// 登録処理
Route::post('/create', [TodoController::class, 'create'])->name('todo.create');
// 更新処理
Route::post('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
// 削除
Route::post('/destroy{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
//検索
Route::get('/search', [TodoController::class, 'search'])->name('todo.search');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

