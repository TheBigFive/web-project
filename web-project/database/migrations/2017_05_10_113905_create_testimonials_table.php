<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestimonialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testimonials', function(Blueprint $table)
		{
			$table->integer('testimonial_id', true);
			$table->string('naam_persoon', 45);
			$table->string('beschrijving_persoon', 45);
			$table->string('titel', 45);
			$table->string('beschrijving_testimonial', 45);
			$table->string('tekstvorm_testimonial', 45);
			$table->string('videolink', 45);
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
		Schema::drop('testimonials');
	}

}
