<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_section', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_category_id');
            $table->string('title');
            $table->string('slug');
            $table->string('blog_image');
            $table->longText('description');
            $table->tinyInteger('is_featured')->default('1')->comment('1=Featured, 2=Not Featured');
            $table->tinyInteger('status')->default('1')->comment('1=active, 2=inactive');
            $table->timestamps();
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_section');
    }
}
