<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    //
    protected $table = 'guru';
    public $timestamps = false;
    protected $fillable = ['idGuru', 'namaGuru', 'tempatLahir', 'tanggalLahir', 'nip', 'nuptk', 'gambarGuru'];
    protected $primaryKey = 'idGuru';
    public $incrementing = false;
}
