<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSkypeAndTimework extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mainlands', function (Blueprint $table) {
            $table->string('skype', 100)->nullable();
        });
        Schema::table('mainlands', function (Blueprint $table) {
            $table->string('time_work', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mainlands', function (Blueprint $table) {
            $table->dropColumn(['skype','time_work']);
        });
    }
}
