<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMainland extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
            Schema::table('mainlands', function (Blueprint $table) {
            $table->string('robots',20);
			$table->string('tel',20);
			$table->string('mobile',20);
			$table->string('mail',50);
			$table->string('facebook',100);
			$table->string('twitter',100);
			$table->string('instagramm',100);
			$table->string('youtube',100);
			$table->string('pinterest',100);
			
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
		  $table->dropColumn(['robots', 'tel', 'mobile','mail','facebook','twitter','instagramm','youtube','pinterest']);
		});
    }
}
