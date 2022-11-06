<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
 {
  
   public function __construct()
    {
      // do nothing
    }

    public function __destruct()
    {
      // do nothing
    }

/**
     * 一覧画面
     */
  public function index()
  {
    $user = Auth::user();
    $todos = Todo::all();
    $param = ['todos' => $todos, 'user' =>$user];
    // return view('index', compact('todos' , 'user'));
    return view('index', $param);    
  }  

    /**
     * 登録処理
     */
    public function create(TodoRequest $request)
    {  
        Todo::create(['content' => $request->content,]);
        return redirect()->route('todo.index');
      }

    /**
     * 更新処理
     */
    public function update(TodoRequest $request, $id)
    {
      
        $todos = Todo::find($id);
        $todos->fill(['content' => $request->content])->save();
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
      }


}

