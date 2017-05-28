<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVeelgesteldevragenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veelgesteldevragen', function(Blueprint $table)
		{
			$table->integer('veelgesteldevraag_id', true);
			$table->string('vraag', 45);
			$table->string('antwoord', 45);
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
		Schema::drop('veelgesteldevragen');
	}

}
