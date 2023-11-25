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
        Schema::create('litigation_order_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('defendants_name');
            $table->string('owner_case');
            $table->string('prosecutor');
            $table->string('id_number_accused');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('litigation_order_details');
    }
};
