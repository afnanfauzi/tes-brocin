<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table= 'dosen';
    protected $guarded = [];

    // if your key name is not 'id'
    // you can also set this to null if you don't have a primary key
    protected $primaryKey = 'kd_dosen';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';


    // public function prodi()
    // {
    //     return $this->belongsTo('App\Prodi', 'kd_dosen');
    // }

    public function prodi()
    {
        return $this->hasOne('App\Prodi');
    }
}
