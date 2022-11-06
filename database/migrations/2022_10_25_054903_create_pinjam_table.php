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
        Schema::create('pinjam', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->nullable();
           $table->foreignId('id_anggota')->constraint('anggota');
           $table->foreignId('id_buku')->constraint('buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_balikin');
            $table->date('tgl_mengembalikan')->nullable();
            $table->integer('denda')->nullable();
            $table->string('status')->nullable();
            $table->integer('jml')->nullable();
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
        Schema::dropIfExists('pinjam');
    }
};
