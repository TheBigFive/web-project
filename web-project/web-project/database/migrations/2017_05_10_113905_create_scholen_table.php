<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScholenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scholen', function(Blueprint $table)
		{
			$table->integer('school_id', true);
			$table->string('naam', 45);
			$table->string('website', 45);
			$table->string('beschrijving', 45);
			$table->string('logo', 45);
			$table->string('goedkeuringsstatus', 45);
			$table->dateTime('toegevoegdop');
			$table->dateTime('goedgekeurdop');
			$table->dateTime('gepubliceerdop');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scholen');
	}

}
