<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table= 'mahasiswa';
    protected $guarded = [];

    // if your key name is not 'id'
    // you can also set this to null if you don't have a primary key
    protected $primaryKey = 'nim';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    // public function prodi()
    // {
    //     return $this->belongsTo('App\Prodi', 'kd_prodi');
    // }

    public function prodi()
    {
        return $this->hasMany('App\Prodi');
    }
}
