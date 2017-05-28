<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInteressegebiedengebruikersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interessegebiedengebruikers', function(Blueprint $table)
		{
			$table->integer('InteressegebiedGebruiker_id', true);
			$table->string('soort_relatie', 45);
			$table->integer('interessegebied_id');
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
		Schema::drop('interessegebiedengebruikers');
	}

}
