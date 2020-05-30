<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table = "user";
    public $timestamps = false;
    protected $fillable = ['idUser', 'email', 'password', 'username'];
    protected $primaryKey = 'idUser';
    public $incrementing = false;
}
