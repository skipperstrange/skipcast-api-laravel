<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('channel_media', function(Blueprint $table)
		{
			$table->bigInteger('channel_id')->unsigned()->index();;
            $table->bigInteger('media_id')->unsigned()->index();;
            $table->foreign('media_id')->references('id')->on('media');
            $table->foreign('channel_id')->references('id')->on('channels');
            $table->enum('active', array('active','inactive'))->default('active');
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
		Schema::drop('channel_media');
	}

}
