<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_read');
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->unsignedBigInteger('initiator_id')->nullable();
            $table->unsignedBigInteger('pweep_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();

            $table->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->foreign('initiator_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->foreign('pweep_id')
                ->references('id')
                ->on('pweeps')
                ->onDelete('CASCADE');

            $table->foreign('type_id')
                ->references('id')
                ->on('notification_types')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('notifications');
    }
}
