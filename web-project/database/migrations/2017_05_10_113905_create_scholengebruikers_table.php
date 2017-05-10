<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScholengebruikersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scholengebruikers', function(Blueprint $table)
		{
			$table->integer('scholengebruikers_id', true);
			$table->string('soort_relatie', 45);
			$table->integer('school_id');
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
		Schema::drop('scholengebruikers');
	}

}
