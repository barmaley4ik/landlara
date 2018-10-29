<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAltAndTitleForImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onebaners', function (Blueprint $table) {
            $table->string('title_image');
        });

        Schema::table('onebaners', function (Blueprint $table) {
            $table->string('alt_image');
        });

        Schema::table('onesliders', function (Blueprint $table) {
            $table->string('title_image');
        });

        Schema::table('onesliders', function (Blueprint $table) {
            $table->string('alt_image');
        });

        Schema::table('onevideos', function (Blueprint $table) {
            $table->string('title_image');
        });

        Schema::table('onevideos', function (Blueprint $table) {
            $table->string('alt_image');
        });

        Schema::table('mainlands', function (Blueprint $table) {
            $table->string('title_image');
        });

        Schema::table('mainlands', function (Blueprint $table) {
            $table->string('alt_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('onebaners', function (Blueprint $table) {
            $table->dropColumn(['title_image']);
        });

        Schema::table('onebaners', function (Blueprint $table) {
            $table->dropColumn(['alt_image']);
        });

        Schema::table('onesliders', function (Blueprint $table) {
            $table->dropColumn(['title_image']);
        });

        Schema::table('onesliders', function (Blueprint $table) {
            $table->dropColumn(['alt_image']);
        });

        Schema::table('onevideos', function (Blueprint $table) {
            $table->dropColumn(['title_image']);
        });

        Schema::table('onevideos', function (Blueprint $table) {
            $table->dropColumn(['alt_image']);
        });
        
        Schema::table('mainlands', function (Blueprint $table) {
            $table->dropColumn(['title_image']);
        });

        Schema::table('mainlands', function (Blueprint $table) {
            $table->dropColumn(['alt_image']);
        });
    }
}
