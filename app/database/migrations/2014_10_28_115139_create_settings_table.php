<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the settings table

		Schema::create('settings', function($table)
		{
		    $table->increments('id');
		    $table->integer('flashcard_count');
		    $table->integer('answer_ability_count');

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
		// Remove the settings table for the rollback

		Schema::dropIfExists('settings');
	}

}
