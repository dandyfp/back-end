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
        Schema::create('order_fuel', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('id_fuel');
            $table->string('name_order');
            $table->string('province');
            $table->string('city');
            $table->string('subdistrict');
            $table->string('detail_address');
            $table->string('payment_method');
            $table->string('status');
            $table->integer('price');
            $table->integer('liter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_fuel');
    }
};
