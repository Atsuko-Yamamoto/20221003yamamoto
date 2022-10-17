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
    protected $primaryKey = 'id';
    protected $guarded = ['id', 'created_at'];

}
