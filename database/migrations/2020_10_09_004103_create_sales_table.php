<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id_sale');
            $table->integer('id_client');
            $table->integer('id_personal');
            $table->string('cuantity');
            $table->date('date');
            $table->timestamps();
            //relation
            $table->foreing('id_client')->references('id_client')->on('clients');
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
        Schema::dropIfExists('sales');
    }
}
