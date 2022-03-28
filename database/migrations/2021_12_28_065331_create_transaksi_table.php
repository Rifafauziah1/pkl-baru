<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buku_id')->unsigned();
            //$table->bigInteger('pembeli_id')->unsigned();
            $table->integer('kode_pembeli');
            $table->string('nama');
            $table->date('tgl_beli');
            $table->integer('jumlah_buku');
            //$table->integer('harga');
            $table->integer('total');
            $table->integer('uang');
            $table->integer('kembalian');
            $table->foreign('buku_id')->references('id')->on('buku')->onUpdate('cascade')->onDelete('cascade');
           // $table->foreign('pembeli_id')->references('id')->on('pembeli')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('transaksi');
    }
}
