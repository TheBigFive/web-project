<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInteressegebiedenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interessegebieden', function(Blueprint $table)
		{
			$table->integer('interessegebied_id', true);
			$table->string('naam', 45);
			$table->string('beschrijving', 45);
			$table->string('afbeelding', 45);
			$table->string('goedkeuringsstatus', 45);
			$table->dateTime('goedgekeurdop');
			$table->dateTime('gepubliceerdop');
			$table->dateTime('toegevoegdop');
			$table->integer('school_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('interessegebieden');
	}

}
