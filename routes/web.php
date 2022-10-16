<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

//一覧画面の表示
Route::get('/', [TodoController::class, 'index'])->name('todo.index');
// 登録画面の表示
//Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
// 登録処理
Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
// 編集画面
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
// // 更新処理
Route::post('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
// 削除
Route::post('/destroy{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
