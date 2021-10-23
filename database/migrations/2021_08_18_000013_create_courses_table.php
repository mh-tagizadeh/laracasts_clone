<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('title');
            // TODO: slug table must be uniqe
            $table->string('slug');
            $table->text('description');
            $table->integer('teacher_id');
            $table->integer('category_id');
            $table->boolean('state')->default(0);
            // TODO: price table must be defual equal 0 
            $table->integer('price');
            $table->integer('sale_price');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
