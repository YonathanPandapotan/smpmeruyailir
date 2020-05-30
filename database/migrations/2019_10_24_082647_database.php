<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('idSiswa', 25);
            $table->string('noPeserta', 25);
            $table->string('nisn', 10);
            $table->string('namaPeserta', 100);
            $table->string('tempatLahir', 100);
            $table->string('kelas', 10);
            $table->date('tanggalLahir');
            $table->decimal('bin', 4, 1);
            $table->decimal('ing', 4, 1);
            $table->decimal('mat', 4, 1);
            $table->decimal('ipa', 4, 1);
            $table->decimal('jumlahNilai', 4, 1);
            $table->string('statusLulus', 100);
            $table->string('gambarPeserta', 100);
            $table->string('statusSiswa', 100);
            $table->text('pesanAlumni');
            $table->string('gambar-siswa', 100);
        });

        Schema::create('guru', function(Blueprint $table){
            $table->string('idGuru', 25);
            $table->string('namaGuru', 100);
            $table->string('tempatLahir', 100);
            $table->string('tanggalLahir', 100);
            $table->string('nip', 100);
            $table->string('nuptk', 100);
            $table->string('gambarGuru', 100);
        });

        Schema::create('gallery', function(Blueprint $table){
            $table->string('idGambar', 25);
            $table->date('tanggalUpload');
            $table->time('waktuUpload');
            $table->string('deskripsi', 25);
            $table->string('uploader', 100);
        });

        Schema::create('berita', function(Blueprint $table){
            $table->string('idBerita', 10);
            $table->string('judulBerita', 100);
            $table->date('tanggalBerita');
            $table->time('waktuBerita');
            $table->string('pembuatBerita', 100);
            $table->text('isiBerita');
            $table->string('gambar');
        });

        Schema::create('user', function(Blueprint $table){
            $table->string('idUser', 10);
            $table->string('email', 100);
            $table->text('password');
            $table->string('username', 100);
        });

        Schema::create('visi', function(Blueprint $table){
            $table->text('visi');
            $table->text('gambar');
        });

        Schema::create('misi', function(Blueprint $table){
            $table->text('misi');
            $table->text('gambar');
        });

        Schema::create('tentang', function(Blueprint $table){
            $table->text('tentang1');
            $table->text('gambar1');
            $table->text('tentang2');
            $table->text('gambar2');
            $table->text('tentang3');
            $table->text('gambar3');
            $table->text('tentang4');
            $table->text('gambar4');
        });

        Schema::create('sejarah', function(Blueprint $table){
            $table->text('sejarah1');
            $table->text('gambar1');
            $table->text('sejarah2');
            $table->text('gambar2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
