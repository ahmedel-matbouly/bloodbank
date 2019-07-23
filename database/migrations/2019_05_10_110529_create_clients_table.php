<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->date('birth_date');
			$table->integer('blood_id')->unsigned();
			$table->string('phone_number');
			$table->string('password');
			$table->string('token');
			$table->date('last_date');
			$table->integer('citie_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}