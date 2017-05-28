<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampussenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campussen', function(Blueprint $table)
		{
			$table->integer('campus_id', true);
			$table->string('naam', 45);
			$table->string('straat_nummer', 45);
			$table->string('postcode', 45);
			$table->string('afbeelding', 45);
			$table->string('coordinaten', 45);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campussen');
	}

}
