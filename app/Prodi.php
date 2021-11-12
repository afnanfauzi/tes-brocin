<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table= 'prodi';
    protected $guarded = [];

    // protected $primaryKey = 'kd_prodi';


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
