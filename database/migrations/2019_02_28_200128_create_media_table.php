<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('title', 254)->nullable();
			$table->int('track')->nullable();
			$table->string('album', 120)->nullable();
			$table->string('year', 4)->nullable();
			$table->string('artist', 120)->nullable();
            $table->enum('type', array('audio/mp3', 'audio/mpeg'))->nullable();
            $table->enum('channelmode', array('mono', 'stereo'))->nullable();
			$table->enum('public', array('public','private'))->default('public');
            $table->enum('downloadable', array('yes','no'))->default('no');
            $table->bigInteger('size')->default(0)->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('user_id')->unsigned()->index();
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
		Schema::drop('media');
	}

}
