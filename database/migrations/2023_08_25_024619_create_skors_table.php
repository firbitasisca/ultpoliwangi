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
        Schema::create('skors', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('skor')->nullable(false)->default(1);
            $table->string('id_pengajuan')->nullable(false);
            $table->unsignedBigInteger('id_pertanyaan_survei')->nullable(false);
            $table->unsignedBigInteger('id_saran')->nullable(false);
            $table->foreign('id_pengajuan')->references('id')->on('pengajuans')->onDelete('cascade');
            $table->foreign('id_pertanyaan_survei')->references('id')->on('pertanyaan_surveis')->onDelete('cascade');
            $table->foreign('id_saran')->references('id')->on('sarans')->onDelete('cascade');
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
        Schema::dropIfExists('skors');
    }
};
