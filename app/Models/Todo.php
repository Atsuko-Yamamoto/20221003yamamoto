<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
       // モデルに関連付けるテーブル
    protected $table = 'todos';
    // テーブルに関連付ける主キー
    protected $primaryKey = 'todo_id';
    protected $guarded = ['id', 'content', 'created_at', 'updated_at'];

    public function findAllTodos()
    {
        return Todo::all();
    }

    /**
     * リクエストされたIDをもとにtodoテーブルのレコードを1件取得
     */
    public function findTodoId($id)
    {
        return Todo::find($id);
    }

  /**
     * 登録処理
     */
    public function InsertTodo($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'todo_name' => $request->todo_name,
        ]);
    }

 /**
     * 更新処理
     */
    public function updateTodo($request, $todo)
    {
        $result = $todo->fill([
            'todo_name' => $request->todo_name
        ])->save();

        return $result;
    }
}
