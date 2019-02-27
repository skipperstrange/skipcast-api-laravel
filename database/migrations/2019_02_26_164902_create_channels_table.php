<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('channels', function(Blueprint $table)
		{
            $table->bigIncrements('id');
			$table->string('name', 60);
			$table->string('description', 140);
			$table->enum('state', array('start','stop'))->default('stop');
			$table->enum('active', array('active','inactive','trash'))->default('active');
            $table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('channels');
	}

}
