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
			$table->text('description');
			$table->enum('state', array('start','stop'))->default('stop');
			$table->enum('active', array('active','inactive','trash'))->default('active');
            $table->enum('privacy', array('private','public'))->default('public');
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
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
