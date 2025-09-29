<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// モデル
use App\Models\Item;
// その他
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = File::get(database_path('seeders/sql/items_at_hiroshima.sql'));
        DB::unprepared($sql);
        $sql = File::get(database_path('seeders/sql/items_at_3rd.sql'));
        DB::unprepared($sql);
    }
}