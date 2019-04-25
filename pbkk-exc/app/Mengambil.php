<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengambil extends Model
{
    //
    protected $table = 'mengambil_matkul';
    protected $fillable = [
        'id_matkul','nrp_mhs','nama_matkul','nama_dosen','nilai'
        ];
}
