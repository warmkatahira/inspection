<?php

use Illuminate\Support\Facades\Route;

// +-+-+-+-+-+-+-+- 商品メニュー +-+-+-+-+-+-+-+-
use App\Http\Controllers\Item\ItemMenu\ItemMenuController;
// +-+-+-+-+-+-+-+- 商品 +-+-+-+-+-+-+-+-
use App\Http\Controllers\Item\Item\ItemController;
use App\Http\Controllers\Item\Item\ItemDownloadController;

Route::middleware('common')->group(function (){
    // +-+-+-+-+-+-+-+- 商品メニュー +-+-+-+-+-+-+-+-
    Route::controller(ItemMenuController::class)->prefix('item_menu')->name('item_menu.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    // +-+-+-+-+-+-+-+- 商品 +-+-+-+-+-+-+-+-
    Route::controller(ItemController::class)->prefix('item')->name('item.')->group(function(){
        Route::get('', 'index')->name('index');
    });
    Route::controller(ItemDownloadController::class)->prefix('item_download')->name('item_download.')->group(function(){
        Route::get('download', 'download')->name('download');
    });
});