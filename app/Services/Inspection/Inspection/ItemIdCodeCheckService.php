<?php

namespace App\Services\Inspection\Inspection;

// モデル
use App\Models\Item;

class ItemIdCodeCheckService
{
    // 商品を取得
    public function getItem($request)
    {
        // 商品を取得
        $item = Item::where('item_jan_code', $request->item_id_code)->first();
        // 商品が取得できていない場合
        if(!$item){
            session(['error_message' => '存在しない商品です<br>'.$request->item_id_code]);
            return;
        }
        // (検品中の場合)検品中の商品と一致しない場合
        if(!is_null(session('item_jan_code')) && $item->item_jan_code != session('item_jan_code')){
            session(['error_message' => '検品中の商品ではありません<br>'.$request->item_id_code]);
            return;
        }
        // (検品中ではない場合)商品情報をセッションに格納
        if(is_null(session('item_jan_code'))){
            session(['item_jan_code' => $item->item_jan_code]);
            session(['stock' => $item->stock]);
            session(['inspection_quantity' => 0]);
        }
    }

    // (検品中の場合)検品数量をカウントアップ
    public function countUp()
    {
        // エラーメッセージがある場合
        if(session('error_message')){
            return;
        }
        // 検品数量をカウントアップ
        session(['inspection_quantity' => session('inspection_quantity') + 1]);
    }
}