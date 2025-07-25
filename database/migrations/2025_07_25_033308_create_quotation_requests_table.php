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
         Schema::create('quotation_requests', function (Blueprint $table) {
        $table->id();
        $table->string('product_name'); // Store the name of the product
        $table->string('customer_name');
        $table->string('email');
        $table->string('phone_number');
        $table->string('quantity_kg');
        $table->string('destination');
        $table->string('transport_mode'); // "Sea" or "Air"
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_requests');
    }
};
