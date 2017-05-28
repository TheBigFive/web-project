<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGesprekkengebruikersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gesprekkengebruikers', function(Blueprint $table)
		{
			$table->integer('gesprekken_gebruikers_id', true);
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
		Schema::drop('gesprekkengebruikers');
	}

}
