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
        Schema::create('base_client', function (Blueprint $table) {
            $table->increments('base_client_id');
            $table->unsignedInteger('client_id');
            $table->string('base_id', 10);
            $table->timestamps();
            // ユニーク制約
            $table->unique(['client_id', 'base_id']);
            // 外部キー制約
            $table->foreign('client_id')->references('client_id')->on('clients')->cascadeOnDelete();
            $table->foreign('base_id')->references('base_id')->on('bases')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_client');
    }
};
