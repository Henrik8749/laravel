<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashcardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the flashcards table

		Schema::create('flashcards', function($table)
		{
		    $table->increments('id');
		    $table->string('front');
		    $table->string('back');
		    $table->string('category');
		    $table->text('front_answers');
		    $table->text('back_answers');
		    $table->boolean('active');

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
		// Remove the flashcards table for the rollback

		Schema::dropIfExists('flashcards');
	}

}
