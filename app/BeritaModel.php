<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    //
    protected $table = 'berita';
    
    public $fillable = ['idBerita', 'judulBerita', 'tanggalBerita', 'pembuatBerita', 'isiBerita', 'gambar'];
    protected $primaryKey = 'idBerita';
    public $timestamps = false;
    public $incrementing = false;

    }
