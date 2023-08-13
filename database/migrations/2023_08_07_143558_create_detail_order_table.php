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
        Schema::create('detail_order', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('date');
            $table->string('status');
            $table->string('id_fuel');
            $table->string('id_order');
            $table->integer('price_fuel');
            $table->integer('liter_fuel');
            $table->integer('grand_total');
            $table->integer('total_paid');
            $table->string('status_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_order');
    }
};
