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
        Schema::create('antrean', function (Blueprint $table) {
            $table->id('id_antrean');
            $table->string('nama');
            $table->integer('nomor_antrean');
            $table->date('tanggal');
            $table->string('status_antrean')->default('menunggu');
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
        Schema::dropIfExists('antrean');
    }
};
