<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table= 'prodi';
    protected $guarded = [];

    // if your key name is not 'id'
    // you can also set this to null if you don't have a primary key
    protected $primaryKey = 'kd_prodi';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';


    // public function dosen()
    // {
    //     return $this->hasOne('App\Dosen', 'kd_dosen', 'kd_prodi');
    // }

    // public function mahasiswa()
    // {
    //     return $this->hasMany('App\Mahasiswa');
    // }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen', 'kd_dosen');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'kd_prodi');
    }
}
