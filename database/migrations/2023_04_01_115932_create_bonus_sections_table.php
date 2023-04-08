<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('values');
            $table->text('description');
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
        Schema::dropIfExists('bonus_sections');
    }
}
