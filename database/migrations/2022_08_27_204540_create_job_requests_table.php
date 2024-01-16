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
        Schema::create('job_requests', function (Blueprint $table) {
            $table->id();
            $table->enum('job_type',['now','future','training']);
            $table->string('job_address')->nullable();
            $table->string('job_numb')->nullable();
            $table->string('job_city')->nullable();
            $table->string('name')->nullable();
            $table->string('sex')->nullable();
            $table->string('national')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place');
            $table->string('region');
            $table->string('special');
            $table->string('certificate');
            $table->string('graduation_rate');
            $table->string('graduation_year');
            $table->string('Fellowships');
            $table->string('experience');
            $table->string('experience_year');
            $table->string('email');
            $table->string('phone');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('job_requests');
    }
};
