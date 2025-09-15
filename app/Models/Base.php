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
        'short_base_name',
        'base_color_code',
        'sort_order',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('sort_order', 'asc');
    }
    // 指定したレコードを取得
    public static function getSpecify($base_id)
    {
        return self::where('base_id', $base_id);
    }
    // base_clientテーブルとのリレーション
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'base_client', 'base_id', 'client_id')
                    ->orderBy('bases.sort_order', 'asc');
    }
}
