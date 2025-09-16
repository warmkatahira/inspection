<?php

namespace App\Http\Controllers\Inspection\InspectionMenu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspectionMenuController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '検品メニュー']);
        return view('inspection.inspection_menu.index')->with([
        ]);
    }
}