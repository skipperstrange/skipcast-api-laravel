<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medias', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('title', 60);
			$table->integer('author');
			$table->enum('type', array('audio','video'))->nullable();
			$table->enum('public', array('public','private'))->default('public');
            $table->enum('downloadable', array('yes','no'))->default('no');
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
		Schema::drop('medias');
	}

}
