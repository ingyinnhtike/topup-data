<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMpssToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('mpss_username')->nullable();
            $table->string('mpss_password')->nullable();
            $table->string('mpss_company_id')->nullable();
            $table->string('mpss_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('mpss_username');
            $table->dropColumn('mpss_password');
            $table->dropColumn('mpss_company_id');
            $table->dropColumn('mpss_key');
        });
    }
}
