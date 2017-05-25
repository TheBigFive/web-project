<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBerichtenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('berichten', function(Blueprint $table)
		{
			$table->integer('berichten_id', true);
			$table->string('boodschap', 45);
			$table->dateTime('verzendenop');
			$table->integer('gesprek_id');
			$table->integer('gebruiker_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('berichten');
	}

}
