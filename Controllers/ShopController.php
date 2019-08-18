<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // DBよりshopテーブルの値を全て取得
        $shops = Shop::all();

        // 取得した値をビュー「shop/index」に渡す
        return view('shop/index', compact('shops'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つshopの情報を取得
        $shop = Shop::findOrFail($id);

        // 取得した値をビュー「shop/edit」に渡す
        return view('shop/edit', compact('shop'));
    }
}
