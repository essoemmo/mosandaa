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
        Schema::create('sub_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->nullable()->constrained('sections')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('is_banner')->default('0');
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
        Schema::dropIfExists('sub_sections');
    }
};
