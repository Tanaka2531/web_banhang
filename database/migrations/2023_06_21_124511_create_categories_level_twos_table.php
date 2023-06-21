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
        Schema::create('categories_level_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cate_one')->constrained('categories')->nullable();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->longText('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_level_twos');
    }
};
