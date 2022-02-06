<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisualizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visualizations', function (Blueprint $table) {
            $table->id();
            $table->string('visualization_title');
            $table->string('visualization_subtitle');
            $table->string('visualization_redirect_link');
            $table->text('visualization_description')->nullable();
            $table->string('visualization_image')->nullable();
            $table->string('visualization_video')->nullable();
            $table->string('gallery_file')->nullable();
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
        Schema::dropIfExists('visualizations');
    }
}
