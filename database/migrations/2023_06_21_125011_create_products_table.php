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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cate')->constrained('categories')->nullable();
            $table->foreignId('id_cate_two')->constrained('categories_level_twos')->nullable();
            $table->foreignId('id_brand')->constrained('brands')->nullable();
            $table->string('name');
            $table->longText('desc')->nullable();
            $table->longText('content')->nullable();
            $table->integer('price_regular')->nullable();
            $table->integer('price_sale')->nullable();
            $table->integer('price_from')->nullable();
            $table->integer('price_to')->nullable();
            $table->string('code')->nullable();
            $table->string('photo')->nullable();
            $table->integer('inventory')->nullable();
            $table->longText('status')->nullable();
            $table->longText('status_hot')->nullable();
            $table->longText('status_best_seller')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
