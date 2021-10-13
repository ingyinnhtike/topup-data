<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordGrantTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_grant_tokens', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('merchant_id')->unsigned()->nullable();
            $table->foreign('merchant_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');

            $table->longText('tokens')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_grant_tokens');
    }
}
