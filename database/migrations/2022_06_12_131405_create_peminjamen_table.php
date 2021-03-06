<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjaman');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->string('nama_petugas');
            $table->double('harga_satuan')->nullable();
            $table->integer('jumlah_pinjam');
            $table->date('tgl_pinjam');
            $table->integer('lama_pinjam');
            $table->double('total_harga')->nullable();
            $table->enum('status', ['Konfirmasi','Dipinjam','Dikembalikan']);
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
        Schema::dropIfExists('peminjamen');
    }
};
