<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000);
            $table->string('category_id');
            $table->string('duration');
            $table->string('no_of_lectures');
            $table->string('number_of_views');
            $table->string('validity_of_course');
            $table->string('intro_video_link');
            $table->string('images', 3000);
            $table->string('description', 1000);
            $table->string('mode');
            $table->string('language');
            $table->string('system_specification');
            $table->string('price');
            $table->string('offered_price');
            $table->string('course_queries', 2000);
            $table->string('study_materials', 5000);
            $table->string('technical_support', 1000);
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
        Schema::dropIfExists('products');
    }
}
