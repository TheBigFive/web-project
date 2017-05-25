<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGesprekkenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gesprekken', function(Blueprint $table)
		{
			$table->integer('gesprek_id', true);
			$table->string('onderwerp', 45);
			$table->string('status', 45);
			$table->integer('school_id');
			$table->integer('interessegebied');
			$table->integer('campus_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gesprekken');
	}

}
