<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_invoices', function (Blueprint $table) {
            $table->id('id_shopping_invoice');
            $table->integer('id_shopping');
            $table->integer('id_article');
            $table->double('price');
            $table->string('total');
            $table->timestamps();
            //relation
            $table->foreing('id_shopping')->references('id_shopping')->on('shoppings');
            $table->foreing('id_article')->references('id_article')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_invoices');
    }
}
