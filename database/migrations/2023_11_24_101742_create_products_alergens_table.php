<?php

use App\Models\User;
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
            $table->unsignedBiginteger('product_id')->unsigned();
            $table->unsignedBiginteger('alergen_id')->unsigned();

            // Claves foráneas
            $table->foreign('product_id')->references('id')
                 ->on('products')->onDelete('cascade');
            $table->foreign('alergen_id')->references('id')
                ->on('alergens')->onDelete('cascade');

            // User info para backend
            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();
            $table->softDeletes();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();

            //
            $table->timestamps();
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
