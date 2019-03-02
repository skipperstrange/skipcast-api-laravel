<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaGenresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media_genres', function(Blueprint $table)
		{
			$table->bigInteger('media_id')->unsigned()->index();;
            $table->integer('genre_id')->unsigned()->index();;
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('media_id')->references('id')->on('medias');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media_genres');
	}

}
