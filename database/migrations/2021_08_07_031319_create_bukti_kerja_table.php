<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('id_deskripsi')->unsigned();
            $table->timestamps();
            $table->foreign('id_deskripsi')->references('id')->on('deskripsi_pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_kerja');
    }
}
