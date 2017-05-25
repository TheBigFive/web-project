<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGebruikersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gebruikers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('voornaam');
			$table->string('achternaam');
			$table->string('email');
			$table->string('password');
			$table->string('profielfoto')->nullable();
			$table->string('studentenclub', 45)->nullable();
			$table->boolean('op_kot')->nullable();
			$table->string('geslacht', 45)->nullable();
			$table->date('geboortedatum')->nullable();
			$table->string('woonplaats')->nullable();
			$table->date('gebruikersinds')->nullable();
			$table->integer('rol_id')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gebruikers');
	}

}
