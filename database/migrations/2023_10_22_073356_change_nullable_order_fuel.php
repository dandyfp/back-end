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
        Schema::table('order_fuel', function (Blueprint $table) {

            $table->string('id_fuel')->nullable()->change();
            $table->string('name_order')->nullable()->change();
            $table->string('province')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('subdistrict')->nullable()->change();
            $table->string('detail_address')->nullable()->change();
            $table->string('payment_method')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->integer('price')->nullable()->change();
            $table->integer('liter')->nullable()->change();
            $table->string('full_address')->nullable()->change();
            $table->string('number_oktan')->nullable()->change();
            $table->integer('shipping_cost')->nullable()->change();
            $table->string("name_fuel")->nullable()->change();
        });


        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
