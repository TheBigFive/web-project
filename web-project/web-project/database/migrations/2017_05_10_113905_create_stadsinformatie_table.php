<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStadsinformatieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stadsinformatie', function(Blueprint $table)
		{
			$table->integer('stadsinformatie_id', true);
			$table->string('titel', 45);
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
		Schema::drop('stadsinformatie');
	}

}
