<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');

            $table->string('sale_person');
            $table->dateTime('sale_date');
            $table->integer('amount')->default(0);
            $table->string('invoice_id');

            $table->integer('merchant_id')->unsigned()->nullable();
            $table->foreign('merchant_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');

            $table->tinyInteger('data')->default(0);
            $table->tinyInteger('bill')->default(0);
            $table->string('payment_type');
            $table->longText('description');

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
        Schema::dropIfExists('deposits');
    }
}
