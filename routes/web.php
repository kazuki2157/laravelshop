<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

// 一覧ページ（検索、ソート、ページネーション機能付き）
Route::get('/', [ShopController::class, 'index'])->name('shop.index');

// 詳細ページ
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('shop.detail');

// 新規作成ページ
Route::get('/create', [ShopController::class, 'create'])->name('shop.create');
Route::post('/store', [ShopController::class, 'store'])->name('shop.store');

// 編集機能のルート
Route::get('/edit/{shop_id}', [ShopController::class, 'edit'])->name('shop.edit');
Route::post('/update/{shop_id}', [ShopController::class, 'update'])->name('shop.update');

// 削除機能のルート
Route::post('/delete/{shop_id}', [ShopController::class, 'destroy'])->name('shop.destroy');
