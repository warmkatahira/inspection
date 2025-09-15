<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prefectures', function (Blueprint $table){
            $table->increments('prefecture_id');
            $table->unsignedInteger('region_id');
            $table->string('prefecture_name', 4);
            $table->timestamps();
            // 外部キー制約
            $table->foreign('region_id')->references('region_id')->on('regions')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefectures');
    }
};
