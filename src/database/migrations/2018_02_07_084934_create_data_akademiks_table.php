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
            $table->integer('user_id');
            $table->string('nomor_un');
            $table->string('nomor_kk')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nama_siswa');
            $table->decimal('bahasa_indonesia')->nullable();
            $table->decimal('bahasa_inggris')->nullable();
            $table->decimal('matematika')->nullable();
            $table->decimal('ipa')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nama_ortu')->nullable();
            $table->string('alamat')->nullable();
            $table->string('npsn_asal_sekolah')->nullable();
            $table->string('asal_sekolah')->nullable();
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
