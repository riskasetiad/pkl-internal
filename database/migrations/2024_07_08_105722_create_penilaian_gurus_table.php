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
        Schema::create('penilaian_gurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->oneDelete('cascade');
            $table->foreignId('id_guru')->constrained('gurus')->oneDelete('cascade');
            $table->foreignId('id_pertanyaanAtasan')->constrained('pertanyaan_atasans')->oneDelete('cascade');
            $table->foreignId('id_pertanyaanGuru')->constrained('pertanyaan_gurus')->oneDelete('cascade');
            $table->foreignId('id_pertanyaanSiswa')->constrained('pertanyaan_siswas')->oneDelete('cascade');
            $table->string('jawaban');
            $table->string('kinerja');
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
        Schema::dropIfExists('penilaian_gurus');
    }
};
