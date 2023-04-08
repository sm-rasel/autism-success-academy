<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurProgramsSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_programs_section', function (Blueprint $table) {
            $table->id();
            $table->string('pillar_name');
            $table->string('pillar_heading');
            $table->mediumText('pillar_text');
            $table->string('pillar_link');
            $table->integer('order');
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
        Schema::dropIfExists('our_programs_section');
    }
}
