<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLformfieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lformfields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('ftype', 100);
			$table->integer('frequired');
			$table->string('label', 100);
			$table->string('placeholder', 150);
			$table->text('validation');
			$table->text('fvalue');
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
        Schema::dropIfExists('lformfields');
    }
}

