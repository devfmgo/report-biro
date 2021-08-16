<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('id_bukti_kerja')->unsigned();
            $table->bigInteger('id_bulan')->unsigned();
            $table->longText('kendala');
            $table->longText('catatan');
            $table->string('P1');
            $table->string('P2');
            $table->string('P3');
            $table->string('P4');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('id_bukti_kerja')->references('id')->on('bukti_kerja');
            $table->foreign('id_bulan')->references('id')->on('bulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history');
    }
}
