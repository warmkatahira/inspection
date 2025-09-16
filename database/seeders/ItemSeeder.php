<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'item_jan_code'     => '1111111111111',
            'item_name'         => '商品AAA',
            'stock'             => 10,
        ]);
        Item::create([
            'item_jan_code'     => '2222222222222',
            'item_name'         => '商品BBB',
            'stock'             => 1,
        ]);
        Item::create([
            'item_jan_code'     => '3333333333333',
            'item_name'         => '商品CCC',
            'stock'             => 4,
        ]);
    }
}