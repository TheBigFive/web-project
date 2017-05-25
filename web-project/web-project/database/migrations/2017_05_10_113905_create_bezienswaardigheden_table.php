<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBezienswaardighedenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bezienswaardigheden', function(Blueprint $table)
		{
			$table->integer('bezienswaardigheid_id', true);
			$table->string('naam', 45);
			$table->string('beschrijving', 45);
			$table->string('afbeelding', 45);
			$table->string('goedkeuringsstatus', 45);
			$table->dateTime('goedgekeurdop');
			$table->dateTime('gepubliceerdop');
			$table->dateTime('toegevoegdop');
			$table->integer('toegevoegddoor_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bezienswaardigheden');
	}

}
