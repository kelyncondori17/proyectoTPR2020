<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoices', function (Blueprint $table) {
            $table->id('id_sale_invoice');
            $table->integer('id_sale');
            $table->integer('id_article');
            $table->double('price');
            $table->string('total');
            $table->timestamps();
            //relation
            $table->foreing('id_sale')->references('id_sale')->on('sales');
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
        Schema::dropIfExists('sale_invoices');
    }
}
