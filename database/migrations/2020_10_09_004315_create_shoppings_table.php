<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->id('id_shopping');
            $table->integer('id_provider');
            $table->integer('id_personal');
            $table->date('shopping_date');
            $table->string('shopping_quantity');
            $table->timestamps();
            //relation
            $table->foreing('id_provider')->references('id_provider')->on('providers');
            $table->foreing('id_personal')->references('id_personal')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppings');
    }
}
