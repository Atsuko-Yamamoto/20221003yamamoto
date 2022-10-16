<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
 {
  
   public function __construct()
    {
        $this->todo = new Todo();
    }

/**
     * 一覧画面
     */
  public function index()
  {
    $todos = $this->todo->findAllTodos();
    //$todos = Todo::all();

    // return view('index', ['todos' => $todos]);
    return view('index', compact('todos'));    
  }  

 /**
     * 登録画面
     */
    // public function create(Request $request)
    // {        
    //   return view('index');
    // }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {  
        $registerTodo = $this->todo->InsertTodo($request);

        //return redirect('/');
        return redirect()->route('todo.index');
      }

    
    /**
     * 編集画面の表示
     */
    // public function edit($id)
    // {
    //     $todo = Todo::find($id);

    //     return view('todo.edit', compact('todos'));
    // }

    /**
     * 更新処理
     */
    public function update(Request $request, $id)
    {
      
        $todos = Todo::find($id);
        
        $updateTodo = $this->todo->updateTodo($request, $todos);

        return redirect()->route('todo.index');
    }



   /**
     * 削除処理
     */
    public function destroy($id)
    {
      //dd($id);

      // テーブルから指定のIDのレコード1件を取得
        $todos = Todo::find($id);

        // レコードを削除
        $todos->delete();
        // 削除したら一覧画面にリダイレクト
        
        return redirect()->route('todo.index');
        //  return view('destroy',['todos' => $todos]);
      }


}

