<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meet_section', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('header_two');
            $table->mediumText('meet_text');
            $table->mediumText('meet_text_two');
            $table->string('button_text');
            $table->string('button_url');
            $table->string('youtube_url');
            $table->string('youtube_image');
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
        Schema::dropIfExists('meet_section');
    }
}
