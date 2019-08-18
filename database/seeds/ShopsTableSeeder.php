<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // テーブルのクリア
      DB::table('shops')->truncate();

      // 初期データ用意（列名をキーとする連想配列）
      $shops = [
           ['name' => 'shop1'],
           ['name' => 'shop2'],
         ];

      // 登録
      foreach ($shops as $shop) {
          \App\shop::create($shop);
      }
    }
}
