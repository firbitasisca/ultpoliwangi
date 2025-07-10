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
        Schema::create('pertanyaan_surveis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_survei')->nullable(false);
            $table->unsignedBigInteger('id_pertanyaan')->nullable(false);
            $table->foreign('id_survei')->references('id')->on('surveis')->onDelete('cascade');
            $table->foreign('id_pertanyaan')->references('id')->on('pertanyaans')->onDelete('cascade');
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
        Schema::dropIfExists('pertanyaan_surveis');
    }
};
