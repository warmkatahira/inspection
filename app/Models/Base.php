<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'base_id';
    // オートインクリメント無効化
    public $incrementing = false;
    // 操作可能なカラムを定義
    protected $fillable = [
        'base_id',
        'base_name',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('base_id', 'asc');
    }
}
