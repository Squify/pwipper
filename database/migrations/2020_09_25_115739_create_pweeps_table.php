<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePweepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pweeps', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->string('image_path_1')->nullable();
            $table->string('image_path_2')->nullable();
            $table->string('image_path_3')->nullable();
            $table->string('image_path_4')->nullable();
            $table->boolean('is_deleted');
            $table->integer('repweep_counter')->default(0);
            $table->integer('like_counter')->default(0);

            $table->unsignedBigInteger('initial_pweep_id')->nullable();

            $table->foreign('initial_pweep_id')
                ->references('id')
                ->on('pweeps')
                ->onDelete('SET NULL');

            $table->unsignedBigInteger('initial_author_id')->nullable();

            $table->foreign('initial_author_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

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
        Schema::dropIfExists('pweeps');
    }
}
