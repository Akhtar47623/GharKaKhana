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
       Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menu_items')->onDelete('cascade');
            $table->text('ingredients')->nullable(); 
            $table->text('toppings')->nullable();
            $table->text('drinks')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
