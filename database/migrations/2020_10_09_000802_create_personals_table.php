<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id('id_personal');
            $table->integer('id_user');
            $table->integer('id_position');
            $table->string('salary');
            $table->string('schedule');
            $table->timestamps();
            //relation
            $table->foreing('id_user')->references('id_user')->on('users');
            $table->foreing('id_position')->references('id_position')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
}
