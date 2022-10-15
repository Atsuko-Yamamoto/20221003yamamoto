<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\TodoRequest;

class TodoController extends Controller
 {
  
   public function __construct()
    {
        $this->todo = new Todo();
    }


  public function index()
  {
    $todos = $this->todos->findAllTodos();
    return view('todo.index', compact('todos'));
  }  

 /**
     * 登録画面
     */
    public function create(Request $request)
    {        
        return view('todo.create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        $registerTodo = $this->todo->InsertTodo($request);
        return redirect()->route('todo.index');
    }

    /**
     * 詳細画面の表示
     */
    public function show($id)
    {
        $todo = Todo::find($id);

        return view('todo.show', compact('todos'));
    }

    /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todo.edit', compact('todos'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $updateTodo = $this->todo->updateTodo($request, $todo);

        return redirect()->route('todo.index');
    }



   /**
     * 削除処理
     */
    public function destroy($id)
    {
      // テーブルから指定のIDのレコード1件を取得
        $todos = Todo::find($id);
        // レコードを削除
        $todos->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('todo.index');
        // return view('destroy',['todos' => $todos]);
      }


}

