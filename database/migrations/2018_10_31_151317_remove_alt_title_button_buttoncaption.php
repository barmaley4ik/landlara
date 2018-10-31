<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAltTitleButtonButtoncaption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onevideos', function (Blueprint $table) {
            $table->dropColumn(['button','caption_button','title_image','alt_image']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('onevideos', function (Blueprint $table) {
            $table->integer('button');
        });
        Schema::table('onevideos', function (Blueprint $table) {
            $table->string('caption_button',100);
        });
        Schema::table('onevideos', function (Blueprint $table) {
            $table->string('title_image',100);
        });
        Schema::table('onevideos', function (Blueprint $table) {
            $table->string('alt_image',100);
        });
    }
}
