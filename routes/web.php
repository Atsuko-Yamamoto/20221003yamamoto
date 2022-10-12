<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/', [TaskController::class, 'index']);
// 削除
Route::post('/destroy{id}', [TaskController::class, 'destroy'])->name('destroy');
