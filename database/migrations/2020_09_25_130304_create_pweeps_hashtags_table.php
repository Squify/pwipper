<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePweepsHashtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pweeps_hashtags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pweep_id');
            $table->unsignedBigInteger('hashtag_id');

            $table->foreign('pweep_id')
                ->references('id')
                ->on('pweeps')
                ->onDelete('restrict');


            $table->foreign('hashtag_id')
                ->references('id')
                ->on('hashtags')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pweeps_hashtags');
    }
}
