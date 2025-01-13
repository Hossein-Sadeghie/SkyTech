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
        Schema::create('products_requested_supplier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_requested_user_id');
            $table->unsignedBigInteger('supplier_request_status_id');
            $table->string('price') ;
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('product_requested_user_id')
                ->references('id')
                ->on('products_requested_users')
                ->onDelete('cascade');

            $table->foreign('supplier_request_status_id')
                ->references('id')
                ->on('supplier_request_status')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_requested_products');
    }
};
