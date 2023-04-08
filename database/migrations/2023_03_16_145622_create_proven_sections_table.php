<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvenSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proven_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('shot_description_one');
            $table->string('shot_description_two');
            $table->string('shot_description_three');
            $table->string('shot_description_four');
            $table->string('shot_description_five');
            $table->string('proven_image');
            $table->tinyInteger('status')->default(1)->comment('1=Active 2=Inactive');
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
        Schema::dropIfExists('proven_sections');
    }
}
