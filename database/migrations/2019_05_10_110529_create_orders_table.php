<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('name_id')->unsigned();
			$table->integer('age');
			$table->integer('blood_id')->unsigned();
			$table->integer('number_bogs');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->integer('phone_number');
			$table->text('notes');
			$table->integer('citie_id')->unsigned();
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}