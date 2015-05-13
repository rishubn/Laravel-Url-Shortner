<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('urls', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('userid');
            $table->text('url');
            $table->string('hash',400);
            $table->integer('counter');
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
		Schema::table('urls', function(Blueprint $table)
		{
			//
		});
	}

}
