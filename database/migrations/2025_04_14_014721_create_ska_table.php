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
    public function up(): void
    {
        Schema::create('ska', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('status_herregistrasi')->nullable();
            $table->string('kode_tiket')->nullable();
            $table->string('keperluan_surat')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('nik')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('dusun')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->text('pesan')->nullable();
            $table->string('file_dokumen')->nullable();
            $table->string('status')->default('menunggu');
            $table->string('nomor_surat')->nullable();
            $table->string('nomor_cetak')->nullable();
            $table->string('id_pengajuans');
            $table->timestamps();

            $table->foreign('id_pengajuans')->references('id')->on('pengajuans')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ska');
    }
};
