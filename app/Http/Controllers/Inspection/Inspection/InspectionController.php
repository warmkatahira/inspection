<?php

namespace App\Http\Controllers\Inspection\Inspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス
use App\Services\Inspection\Inspection\ItemIdCodeCheckService;
use App\Services\Inspection\Inspection\CompleteService;
// その他
use Illuminate\Support\Facades\DB;

class InspectionController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '検品']);
        // セッションを初期化
        session(['item_jan_code' => null]);
        session(['inspection_quantity' => 0]);
        return view('inspection.inspection.index')->with([
        ]);
    }

    // 商品識別コードが変更された際の処理
    public function ajax_check_item_id_code(Request $request)
    {
        // セッションを初期化
        session(['error_message' => null]);
        // インスタンス化
        $ItemIdCodeCheckService = new ItemIdCodeCheckService;
        // 商品を取得
        $ItemIdCodeCheckService->getItem($request);
        // (検品中の場合)検品数量をカウントアップ
        $ItemIdCodeCheckService->countUp();
        // 結果を返す
        return response()->json([
            'error_message' => session('error_message'),
            'stock' => session('stock'),
            'inspection_quantity' => session('inspection_quantity'),
        ]);
    }

    public function complete(Request $request)
    {
        try{
            DB::transaction(function () use ($request){
                // インスタンス化
                $CompleteService = new CompleteService;
                // 検品情報を更新
                $CompleteService->updateItem();
            });
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with([
                'alert_type' => 'error',
                'alert_message' => $e->getMessage(),
            ]);
        }
        return redirect()->route('inspection.index')->with([
            'alert_type' => 'success',
            'alert_message' => '検品が完了しました。',
        ]);
    }
}