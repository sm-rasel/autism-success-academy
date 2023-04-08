<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_section', function (Blueprint $table) {
            $table->id();
            $table->string('heading_one');
            $table->string('tag_line');
            $table->string('question_text');
            $table->string('heading_two');
            $table->string('heading_three');
            $table->string('button_text');
            $table->string('roll_out');
            $table->string('button_url');
            $table->string('video');
            $table->string('logo_image')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active, 2=inactive');
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
        Schema::dropIfExists('hero_section');
    }
}
