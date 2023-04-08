<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDreamSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dream_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('shot_description_one');
            $table->string('shot_description_two');
            $table->text('shot_description_three');
            $table->string('button_url');
            $table->string('dream_image');
            $table->tinyInteger('status')->default(1)->comment('1=Active, 2=Inactive');
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
        Schema::dropIfExists('dream_sections');
    }
}
