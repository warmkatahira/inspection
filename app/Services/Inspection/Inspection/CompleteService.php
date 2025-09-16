<?php

namespace App\Services\Inspection\Inspection;

// モデル
use App\Models\Item;
// その他
use Carbon\CarbonImmutable;

class CompleteService
{
    // 検品情報を更新
    public function updateItem()
    {
        // JANコードが無い場合
        if(is_null(session('item_jan_code'))){
            throw new \RuntimeException('検品中ではありません。');
        }
        // 検品情報を更新
        Item::where('item_jan_code', session('item_jan_code'))->update([
            'inspection_quantity' => session('inspection_quantity'),
            'is_completed' => 1,
            'inspected_at' => CarbonImmutable::now(),
        ]);
    }
}