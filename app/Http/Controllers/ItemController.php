<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Item;


class ItemController extends Controller
{
  //商品一覧
    public function index()
    {
        // DBよりItemテーブルの値を全て取得
        $items = Item::all();
        // 取得した値をビュー「items」に渡す
        return view('item/index', compact('items'));
    }
    //新規作製
    public function create()
    {
      // 空の$bookを渡す
        $item = new Item();
        return view('item/create', compact('item'));
    }

    //商品登録
    public function store(ItemRequest $request)
    {
        $item = new Item();
        $item->title = $request->title;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = base64_encode($request->image);
        $item->shop_list = $request->shop_list;
        $item->save();

        return redirect("/item");
    }
    // public function show($id)
    // {
    //     //
    // }
    //編集
    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つItemの情報を取得
        $item = item::findOrFail($id);

        // 取得した値をビュー「item/edit」に渡す
        return view('item/edit', compact('item'));
    }
    //更新
    public function update(ItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->title = $request->title;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = base64_encode(file_get_contents($request->image));
        $item->shop_list = $request->shop_list;
        $item->save();

        return redirect("/item");
    }
    //削除
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect("/item");
    }
    //検索
    public function getItemByTitle(ItemRequest $request)
   {
       $id = Item::where('title', $request)->groupBy('id')->pluck('id');
       $item = Item::findOrFail($id);
       $item->title = $request->title;
       $item->price = $request->price;
       $item->description = $request->description;
       $item->image = base64_encode(file_get_contents($request->image));

       return response()->json($item());
   }
}
