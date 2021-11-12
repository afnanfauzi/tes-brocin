<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table= 'mahasiswa';
    protected $guarded = [];

    // protected $primaryKey = 'nim';

    public function prodi()
    {
        return $this->belongsTo('App\Prodi', 'kd_prodi');
    }
}
