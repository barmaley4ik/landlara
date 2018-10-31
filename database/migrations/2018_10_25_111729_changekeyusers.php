<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Changekeyusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
          //  $table->integer('role_id')->change();
        });
        Schema::table('user_roles', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            //  $table->integer('role_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('users', function (Blueprint $table) {
           // $table->unsignedInteger('role_id')->change();
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('user_roles', function (Blueprint $table) {
            // $table->unsignedInteger('role_id')->change();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }
}
