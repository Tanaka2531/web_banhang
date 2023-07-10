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
        Schema::create('size_color_photo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_products')->constrained('products')->nullable();
            $table->foreignId('id_size')->constrained('sizes')->nullable();
            $table->foreignId('id_color')->constrained('colors')->nullable();
            $table->integer('price_regular')->nullable();
            $table->integer('price_sale')->nullable();
            $table->string('photo')->nullable();
            $table->integer('inventory')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_color_photo');
    }
};
