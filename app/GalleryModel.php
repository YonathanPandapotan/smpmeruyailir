<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    //
    protected $table = 'gallery';
    public $fillable = ['idGambar', 'tanggalUpload', 'waktuUpload', 'uploader', 'captionGambar', 'deskripsi'];
    protected $primaryKey = 'idGambar';
    public $timestamps = false;
    public $incrementing = false;
}
