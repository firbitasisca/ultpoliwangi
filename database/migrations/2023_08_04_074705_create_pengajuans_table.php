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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('kode_tiket', 7)->unique()->nullable(false);
            $table->string('nama_pemohon', 255)->nullable(false);
            $table->string('nomor_identitas', 16)->nullable(false);
            $table->string('email', 255)->nullable(false);
            $table->string('jenis_permohonan', 100)->nullable(false);
            $table->date('tanggal_permohonan')->nullable(false);
            $table->string('nomor_telepon', 15)->nullable(false);
            $table->string('submission_confirmed', 20)->nullable(false)->default('No');
            $table->unsignedBigInteger('id_prodi')->nullable(true);
            $table->unsignedBigInteger('id_layanan')->nullable(false);
            $table->foreign('id_prodi')->references('id')->on('prodis')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id')->on('layanans')->onDelete('cascade');
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
        Schema::dropIfExists('pengajuans');
    }
};
