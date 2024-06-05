<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('cart_id');

            $table->index('product_id', 'cart_product_product_idx');
            $table->index('cart_id', 'cart_product_cart_idx');

            $table->foreign('product_id', 'cart_product_product_fk')->on('products')->references('id');
            $table->foreign('cart_id', 'cart_product_cart_fk')->on('carts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_product');
    }
};
