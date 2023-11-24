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
        Schema::create('products_alergens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('products_id')->unsigned();
            $table->unsignedBiginteger('alergens_id')->unsigned();

            $table->foreign('products_id')->references('id')
                 ->on('products')->onDelete('cascade');
            $table->foreign('alergens_id')->references('id')
                ->on('alergens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_alergens');
    }
};
