<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('project_image1')->nullable();
            $table->string('project_image2')->nullable();
            $table->string('project_image3')->nullable();
            $table->string('project_image4')->nullable();
            $table->string('project_image5')->nullable();
            $table->string('project_image6')->nullable();
            $table->string('project_image7')->nullable();
            $table->string('project_image8')->nullable();
            $table->string('project_image9')->nullable();
            $table->string('project_image10')->nullable();
            $table->string('project_image11')->nullable();
            $table->string('project_image12')->nullable();

            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('projects_images');
    }
}
