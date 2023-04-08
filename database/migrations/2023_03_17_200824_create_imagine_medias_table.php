<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagineMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagine_medias', function (Blueprint $table) {
            $table->id();
            $table->string('imagine_title');
            $table->string('imagine_title_two');
            $table->string('imagine_title_three');
            $table->string('imagine_image');
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
        Schema::dropIfExists('imagine_medias');
    }
}
