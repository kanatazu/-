<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('items')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $items = [
             ['title' => 'Book',
              'description' => 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq',
              'price' => 2000,
              'image' => 'aaaa',
              'shop_list' => 2],
             ['title' => 'Book',
              'description' => 'oooooooooooooooooooooooooooooooooooooooooo',
              'price' => 2000,
              'image' => 111,
              'shop_list' => 3],
             ['title' => 'Book',
              'description' => 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk',
              'price' => 2000,
              'image' => 2222,
              'shop_list' => 4]
            ];

        // 登録
        foreach ($items as $item) {
            \App\Item::create($item);
        }
    }
}
