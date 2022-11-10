<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
       // モデルに関連付けるテーブル
    protected $table = 'tags';
    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';
    protected $fillable = ['tag', 'updated_at'];

    // リレーション
    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
