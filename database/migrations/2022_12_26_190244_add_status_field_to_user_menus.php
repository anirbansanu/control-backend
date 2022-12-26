<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_menus', function (Blueprint $table) {
            //
            $table->tinyInteger('status')->before('route')->default(0)->comment("0=inactive, 1=active");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_menus', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
    }
};
