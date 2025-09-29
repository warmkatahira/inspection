<?php

namespace App\Services\Item\Item;

// モデル
use App\Models\Item;
// その他
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\CarbonImmutable;
// 列挙
use App\Enums\SystemEnum;

class ItemDownloadService
{
    // ダウンロードするデータを取得
    public function getDownloadData($items)
    {
        // チャンクサイズを指定
        $chunk_size = 1000;
        $response = new StreamedResponse(function () use ($items, $chunk_size){
            // ハンドルを取得
            $handle = fopen('php://output', 'wb');
            // BOMを書き込む
            fwrite($handle, "\xEF\xBB\xBF");
            // システムに定義してあるヘッダーを取得し、書き込む
            $header = Item::downloadHeader();
            fputcsv($handle, $header);
            // レコードをチャンクごとに書き込む
            $items->chunk($chunk_size, function ($items) use ($handle){
                // 商品の分だけループ処理
                foreach($items as $item){
                    // 変数に情報を格納
                    $row = [
                        $item->base->base_name,
                        $item->item_jan_code,
                        $item->item_name,
                        $item->stock,
                        $item->inspection_quantity,
                        $item->stock - $item->inspection_quantity,
                        $item->is_completed_text,
                        is_null($item->inspected_at) ? null : CarbonImmutable::parse($item->inspected_at)->isoFormat('Y年MM月DD日'),
                        is_null($item->inspected_at) ? null : CarbonImmutable::parse($item->inspected_at)->isoFormat('HH:mm:ss'),
                    ];
                    // 書き込む
                    fputcsv($handle, $row);
                };
            });
            // ファイルを閉じる
            fclose($handle);
        });
        return $response;
    }
}