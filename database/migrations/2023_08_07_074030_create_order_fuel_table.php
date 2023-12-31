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
            $table->string('id_fuel')->unsigned()->nullable()->change();
            $table->string('name_order')->unsigned()->nullable()->change();
            $table->string('province')->unsigned()->nullable()->change();
            $table->string('city')->unsigned()->nullable()->change();
            $table->string('subdistrict')->unsigned()->nullable()->change();
            $table->string('detail_address')->unsigned()->nullable()->change();
            $table->string('payment_method')->unsigned()->nullable()->change();
            $table->string('status')->unsigned()->nullable()->change();
            $table->integer('price')->unsigned()->nullable()->change();
            $table->integer('liter')->unsigned()->nullable()->change();
            $table->string('telpon')->unsigned()->nullable()->change();
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
