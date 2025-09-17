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
        // 商品を取得
        $item = Item::where('item_jan_code', session('item_jan_code'))->first();
        // 既に検品が実施済みの場合
        if($item->is_completed){
            // 検品情報を更新(検品数量を加算)
            $item->increment('inspection_quantity', session('inspection_quantity'), [
                'inspected_at' => CarbonImmutable::now(),
            ]);
        }
        // 初めての検品の場合
        if(!$item->is_completed){
            // 検品情報を更新
            $item->update([
                'inspection_quantity' => session('inspection_quantity'),
                'is_completed' => 1,
                'inspected_at' => CarbonImmutable::now(),
            ]);
        }
    }
}