<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('shot_description_one');
            $table->string('shot_description_two');
            $table->string('first_image');
            $table->string('button_url');
            $table->integer('order');
            $table->tinyInteger('status')->default('1')->comment('1=Active, 2=Inactive');
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
        Schema::dropIfExists('first_sections');
    }
}
