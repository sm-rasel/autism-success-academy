<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_section', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('heading_one');
            $table->string('heading_two');
            $table->mediumText('about_one');
            $table->mediumText('about_two');
            $table->mediumText('about_three')->nullable();
            $table->mediumText('about_four')->nullable();
            $table->mediumText('about_five')->nullable();
            $table->mediumText('about_six')->nullable();
            $table->string('go_text');
            $table->string('about_image');
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
        Schema::dropIfExists('about_section');
    }
}
