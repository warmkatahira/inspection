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
            $table->string('item_jan_code', 13)->unique();
            $table->string('item_name', 255);
            $table->unsignedInteger('stock');
            $table->unsignedInteger('inspection_quantity')->nullable();
            $table->boolean('is_completed')->default(0);
            $table->timestamp('inspected_at')->nullable();
            $table->timestamps();
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
