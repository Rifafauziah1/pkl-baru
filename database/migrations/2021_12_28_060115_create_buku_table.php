<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('judul');
            $table->biginteger('nama_kategori')->unsigned();
            $table->biginteger('nama_pengarang')->unsigned();
            $table->biginteger('nama_penerbit')->unsigned();
            $table->string('deskripsi');
            $table->integer('stok');
            $table->integer('harga');
            $table->string('cover')->nullable();
            $table->foreign('nama_kategori')->references('id')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nama_pengarang')->references('id')->on('pengarang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nama_penerbit')->references('id')->on('penerbit')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('buku');
    }
}
