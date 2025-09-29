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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_no');
            $table->string('item_jan_code', 13);
            $table->string('item_name', 255);
            $table->unsignedInteger('stock');
            $table->unsignedInteger('inspection_quantity')->nullable();
            $table->boolean('is_completed')->default(0);
            $table->timestamp('inspected_at')->nullable();
            $table->string('base_id', 10);
            $table->timestamps();
            // 複合ユニークキー
            $table->unique(['base_id', 'item_jan_code']);
            // 外部キー
            $table->foreign('base_id')->references('base_id')->on('bases')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
