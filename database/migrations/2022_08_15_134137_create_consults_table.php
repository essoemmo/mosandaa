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
        Schema::create('consults', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');

            $table->string('position_ar');
            $table->string('position_en');

            $table->string('title_ar');
            $table->string('title_en');

            $table->string('image');
            
            $table->longText('description_ar');
            $table->longText('description_en');

            $table->enum('type',['branch','department','consult']);
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
        Schema::dropIfExists('consults');
    }
};
