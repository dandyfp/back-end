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
        Schema::create('item_fuels', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->integer('number_oktan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_fuels');
    }
};
