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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('image');
                $table->unsignedBigInteger('sex')->default(0);
                $table->unsignedBigInteger('categories_id');
                $table->unsignedBigInteger('manufacturer_id');
                $table->text('description');
                $table->string('unique_token', 250)->unique();
                $table->bigInteger('price');
                $table->bigInteger('inventory');
                $table->timestamps();
                $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('sex')->references('id')->on('sexes')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade')->onUpdate('cascade');
                $table->boolean("onSale")->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
