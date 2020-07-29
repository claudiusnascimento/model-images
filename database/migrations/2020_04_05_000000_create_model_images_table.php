<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_images', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('rel');
            $table->bigInteger('rel_id')->unsigned();
            $table->string('src', 500)->nullable();
            $table->text('title')->nullable();
            $table->text('alt')->nullable();
            $table->string('class_html')->nullable();
            $table->string('id_html')->nullable();
            $table->text('content')->nullable();
            $table->boolean('active')->default(false)->nullable();
            $table->integer('order')->default(0)->nullable();
            $table->integer('width');
            $table->integer('height');
            $table->integer('weight');
            $table->text('filters')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('model_images');
    }
}
