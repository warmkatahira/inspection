<?php

use Illuminate\Support\Facades\Route;

// +-+-+-+-+-+-+-+- 検品メニュー +-+-+-+-+-+-+-+-
use App\Http\Controllers\Inspection\InspectionMenu\InspectionMenuController;
// +-+-+-+-+-+-+-+- 検品 +-+-+-+-+-+-+-+-
use App\Http\Controllers\Inspection\Inspection\InspectionController;

Route::middleware('common')->group(function (){
    // +-+-+-+-+-+-+-+- 検品メニュー +-+-+-+-+-+-+-+-
    Route::controller(InspectionMenuController::class)->prefix('inspection_menu')->name('inspection_menu.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    // +-+-+-+-+-+-+-+- 検品 +-+-+-+-+-+-+-+-
    Route::controller(InspectionController::class)->prefix('inspection')->name('inspection.')->group(function(){
        Route::get('', 'index')->name('index');
        Route::get('ajax_check_item_id_code', 'ajax_check_item_id_code');
        Route::post('complete', 'complete')->name('complete');
    });
});