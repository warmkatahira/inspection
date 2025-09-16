<?php

namespace App\Http\Controllers\Inspection\Inspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function index()
    {
        // ページヘッダーをセッションに格納
        session(['page_header' => '検品']);
        return view('inspection.inspection.index')->with([
        ]);
    }
}