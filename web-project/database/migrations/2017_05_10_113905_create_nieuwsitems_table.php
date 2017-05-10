<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNieuwsitemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nieuwsitems', function(Blueprint $table)
		{
			$table->integer('nieuwsitem_id', true);
			$table->string('titel', 45);
			$table->string('ondertitel', 45);
			$table->string('artikel', 45);
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
		Schema::drop('nieuwsitems');
	}

}
