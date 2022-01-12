<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('project_title');

            $table->string('address')->nullable();
            $table->string('land_area')->nullable();
            $table->string('occupation_type')->nullable();
            $table->string('classification')->nullable();
            $table->string('no_of_stories')->nullable();
            $table->string('no_of_car_parking')->nullable();
            $table->string('apartment_size')->nullable();
            $table->string('no_of_apartment')->nullable();
            $table->string('no_of_lifts')->nullable();
            $table->string('no_of_stairs')->nullable();
            $table->string('no_of_generator')->nullable();
            $table->string('water_reserve')->nullable();

            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->text('project_description')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('publication_status')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
