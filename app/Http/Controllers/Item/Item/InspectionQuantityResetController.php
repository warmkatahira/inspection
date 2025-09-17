<?php

namespace App\Http\Controllers\Item\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// モデル
use App\Models\Item;
// その他
use Illuminate\Support\Facades\DB;

class InspectionQuantityResetController extends Controller
{
    public function reset(Request $request)
    {
        try{
            DB::transaction(function () use ($request){
                // 検品実績をリセット
                Item::where('item_no', $request->item_no)->update([
                    'inspection_quantity' => 0,
                    'is_completed' => 0,
                    'inspected_at' => null,
                ]);
            });
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with([
                'alert_type' => 'error',
                'alert_message' => $e->getMessage(),
            ]);
        }
        return redirect()->back()->with([
            'alert_type' => 'success',
            'alert_message' => '検品数量のリセットが完了しました。',
        ]);
    }
}