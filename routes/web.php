<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

//一覧画面の表示
Route::get('/', [TodoController::class, 'index'])->name('todo.index');
// 登録処理
Route::post('/create', [TodoController::class, 'create'])->name('todo.create');
// 更新処理
Route::post('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
// 削除
Route::post('/destroy{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
