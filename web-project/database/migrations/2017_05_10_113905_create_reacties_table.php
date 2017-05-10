<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReactiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reacties', function(Blueprint $table)
		{
			$table->integer('reactie_id', true);
			$table->string('reactietekst', 45);
			$table->dateTime('reageerdop');
			$table->integer('gebruiker_id');
			$table->integer('nieuwsitem_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reacties');
	}

}
