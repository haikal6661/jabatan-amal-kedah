<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Members extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('kod_kawasans_id');
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->string('alamat');
            $table->bigInteger('no_ic');
            $table->integer('umur');
            $table->string('no_hp');
            $table->string('no_ahli_pas');
            $table->string('no_ahli_amal');
            $table->string('emel');
            $table->string('pekerjaan');
            $table->string('kemahiran');
            $table->string('nama_waris');
            $table->string('no_hp_waris');
            $table->string('jawatan');
            $table->text('desc_jawatan')->nullable();
            $table->boolean('ahli_baru')->nullable();
            $table->string('tahun_sertai')->nullable();
            $table->boolean('yuran_keahlian');
            $table->date('tarikh_disahkan');
            $table->timestamps();

            $table->foreign('kod_kawasans_id')->references('id')->on('kod_kawasans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
