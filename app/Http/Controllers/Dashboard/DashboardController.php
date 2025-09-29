<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Item;
// その他
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => 'ダッシュボード('.Auth::user()->base->base_name.')']);
        // 商品数を取得
        $item_count = Item::getAll()->count();
        // 検品実施済みの商品数を取得
        $inspection_complete_count = Item::where('is_completed', 1)->count();
        // 本日検品が完了した商品数を取得
        $today_inspection_complete_count = Item::where('is_completed', 1)->whereDate('inspected_at', CarbonImmutable::today())->count();
        // 進捗率を取得
        $progress_rate = ($inspection_complete_count / $item_count) * 100;
        // 検品した数量を取得
        $total_inspection_quantity = Item::getAll()->sum('inspection_quantity');
        return view('dashboard')->with([
            'item_count' => $item_count,
            'inspection_complete_count' => $inspection_complete_count,
            'today_inspection_complete_count' => $today_inspection_complete_count,
            'progress_rate' => $progress_rate,
            'total_inspection_quantity' => $total_inspection_quantity,
        ]);
    }
}