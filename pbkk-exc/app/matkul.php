<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama_matkul', 'id_matkul'
        ];
}
