<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('organization_name');
            $table->string('email');
            $table->string('phone');

            $table->string('activity_type');
            $table->string('legal_entity');
            $table->string('service_location');
            $table->string('request_service');
            $table->string('region');
            $table->string('neighbourhood');
            $table->text('activity_type_desc')->nullable();
            $table->text('service_location_desc')->nullable();
            $table->boolean('price_offer')->default(false);

            $table->string('commercial_register')->nullable();
            $table->string('found_contract')->nullable();
            $table->string('financial')->nullable();
            $table->string('balance')->nullable();
            $table->boolean('is_read')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_requests');
    }
};
