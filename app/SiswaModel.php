<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    //
    protected $table = 'siswa';

    public $fillable = ['idSiswa', 'noPeserta', 'nisn', 'namaPeserta', 'tempatLahir', 'tanggalLahir', 'kelas', 'bin', 'ing', 'mat', 'ipa', 'jumlahNilai', 'statusLulus', 'gambarPeserta', 'statusSiswa', 'pesanAlumni'];
    protected $primaryKey = 'idSiswa';
    public $timestamps = false;
    public $incrementing = false;
}