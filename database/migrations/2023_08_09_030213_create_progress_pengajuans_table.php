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
        Schema::create('progress_pengajuans', function (Blueprint $table) {
            $table->id();
            $table->text('pesan')->nullable(false);
            $table->string('file_dokumen')->nullable(true);
            $table->date('tanggal')->nullable(false);
            $table->string('status')->nullable(true);
            $table->string('id_pengajuan')->nullable(false);
            $table->foreign('id_pengajuan')->references('id')->on('pengajuans')->onDelete('cascade');
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
        Schema::dropIfExists('progress_pengajuans');
    }
};
