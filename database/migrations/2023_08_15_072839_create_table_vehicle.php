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
        Schema::create('table_vehicle', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('user_id');
            $table->string('type_vehicle');
            $table->string('name_brand');
            $table->string('number_vehicle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_vehicle');
    }
};
