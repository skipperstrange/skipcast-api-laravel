<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelGenresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('channel_genres', function(Blueprint $table)
		{
			$table->bigInteger('channel_id')->unsigned()->index();;
            $table->integer('genre_id')->unsigned()->index();;
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('channel_id')->references('id')->on('channels');
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
		Schema::drop('channel_genres');
	}

}
