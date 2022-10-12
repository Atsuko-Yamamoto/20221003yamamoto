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
        return redirect()->route('index');
    }
}

