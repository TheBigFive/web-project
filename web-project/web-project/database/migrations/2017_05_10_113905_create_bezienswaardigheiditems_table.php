<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBezienswaardigheiditemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bezienswaardigheiditems', function(Blueprint $table)
		{
			$table->integer('bezienswaardigheiditem_id', true);
			$table->string('naam', 45);
			$table->string('beschrijving', 45);
			$table->string('afbeelding', 45);
			$table->integer('bezienswaardigheid_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bezienswaardigheiditems');
	}

}
