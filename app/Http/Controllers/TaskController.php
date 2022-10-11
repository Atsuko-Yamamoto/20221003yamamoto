<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\TaskRequest;

class TaskController extends Controller
 {
  public function index()
  {
    $todos = Todo::all();
    return view('index', ['todos' => $todos]);
  }  //

public function create(TaskRequest $request)
  {
  $content = $request->input('content');
  }
}

