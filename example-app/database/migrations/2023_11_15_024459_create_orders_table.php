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
        if (!Schema::hasTable('orders')) {

            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('bills_id');
                $table->unsignedBigInteger('product_id');
                $table->integer('quantity');
                $table->bigInteger('price');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('bills_id')->references('id')->on('bills')->onDelete('cascade')->onUpdate('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
