<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampusgebruikersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campusgebruikers', function(Blueprint $table)
		{
			$table->integer('campusgebruikers_id', true);
			$table->string('soort_relatie', 45);
			$table->integer('campus_id');
			$table->integer('gebruikers_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campusgebruikers');
	}

}
