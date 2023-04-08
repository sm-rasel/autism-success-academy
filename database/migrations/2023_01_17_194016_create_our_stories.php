<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurStories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_stories', function (Blueprint $table) {
            $table->id();
            $table->string('success_image');
            $table->integer('order');
            $table->tinyInteger('is_featured')->default('2')->comment('1=Featured, 2=Not featured');
            $table->tinyInteger('status')->default(1)->comment('1=active, 2=inactive');
            $table->tinyInteger('program_upper')->default(2)->comment('1=Show Program Upper, 2=Not show');
            $table->tinyInteger('program_second')->default(2)->comment('1=Show Program Second, 2=Not show');
            $table->tinyInteger('program_third')->default(2)->comment('1=Show Program Third, 2=Not show');
            $table->tinyInteger('program_bottom')->default(2)->comment('1=Show Program Bottom, 2=Not show');
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
        Schema::dropIfExists('our_stories');
    }
}
