<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table= 'dosen';
    protected $guarded = [];

    // protected $primaryKey = 'kd_dosen';


    // public function prodi()
    // {
    //     return $this->belongsTo('App\Prodi', 'kd_dosen');
    // }

    public function prodi()
    {
        return $this->hasOne('App\Prodi');
    }
}
