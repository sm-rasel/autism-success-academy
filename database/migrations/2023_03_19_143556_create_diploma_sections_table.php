<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiplomaSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diploma_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description_one');
            $table->string('course_value_one');
            $table->longText('description_two');
            $table->string('course_value_two');
            $table->string('total_value');
            $table->integer('order');
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
        Schema::dropIfExists('diploma_sections');
    }
}
