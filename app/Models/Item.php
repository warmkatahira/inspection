<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// その他
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    // 主キーカラムを変更
    protected $primaryKey = 'item_no';
    // 操作可能なカラムを定義
    protected $fillable = [
        'item_jan_code',
        'item_name',
        'stock',
        'inspection_quantity',
        'is_completed',
        'inspected_at',
        'base_id',
    ];
    // 全てのレコードを取得
    public static function getAll()
    {
        return self::orderBy('item_jan_code', 'asc');
    }
    // basesテーブルとのリレーション
    public function base()
    {
        return $this->belongsTo(Base::class, 'base_id', 'base_id');
    }
    // ダウンロード時のヘッダーを定義
    public static function downloadHeader()
    {
        return [
            '倉庫名',
            '商品JANコード',
            '商品名',
            '理論在庫数',
            '検品数量',
            '差分',
            '検品ステータス',
            '検品実施日',
            '検品実施時間',
        ];
    }
    // 検品ステータスを返すアクセサ
    public function getIsCompletedTextAttribute(): string
    {
        return $this->is_completed ? '実施済' : '未実施';
    }
    // ログインしている倉庫の商品だけにしている
    protected static function booted()
    {
        static::addGlobalScope('user_base', function (Builder $builder) {
            if (Auth::check()) {
                $builder->where('base_id', Auth::user()->base_id);
            }
        });
    }
}
