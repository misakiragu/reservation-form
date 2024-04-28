<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of all shops.
     *
     * @return \Illuminate\Http\Response
     */
    public function shopAll()
    {
        $shops = Shop::all();  // Shop モデルを通じてすべての店舗情報を取得
        return view('shopall', ['shops' => $shops]);  // ビューにデータを渡す
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id); // IDに基づき店舗情報を取得、見つからない場合は404エラー
        return view('shops.show', compact('shop')); // 詳細ビューにデータを渡す
    }
}