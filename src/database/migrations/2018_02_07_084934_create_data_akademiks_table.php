<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataAkademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('data_akademiks', function(Blueprint $table) {
			$table->increments('id');
			$table->string('label');
			$table->string('keterangan');
			$table->integer('user_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::drop('data_akademiks');
	}
}
