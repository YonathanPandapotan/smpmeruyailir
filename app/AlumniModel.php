<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumniModel extends Model
{
    //
    protected $table = 'alumni';
    public $primaryKey = 'idAlumni';
    public $incrementing = false;
    public $timestamps = false;
}
