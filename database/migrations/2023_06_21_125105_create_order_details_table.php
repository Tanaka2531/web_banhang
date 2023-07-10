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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->constrained('orders')->nullable();
            $table->foreignId('id_product')->constrained('products')->nullable();
            $table->integer('temp_price');
            $table->integer('ship_price')->nullable();
            $table->integer('price_regular');
            $table->integer('price_sale');
            $table->string('photo');
            $table->string('name_size');
            $table->string('name_color');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
