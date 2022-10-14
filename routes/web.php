<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/', [TodoController::class, 'index'])->name('todo.index');
// 削除
Route::post('/destroy{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
