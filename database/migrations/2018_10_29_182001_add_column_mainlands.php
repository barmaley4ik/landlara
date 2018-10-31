<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMainlands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mainlands', function (Blueprint $table) {
            $table->integer('type_background');
			$table->string('image_background',150);
			$table->string('video_background',150);
			$table->string('color_background',10);
			$table->text('adress');
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
            $table->dropColumn(['type_background','image_background','video_background','color_background','adress'  ]);
        });
     }
}
