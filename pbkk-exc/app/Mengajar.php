<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    //
    protected $table = 'mengajar';
    protected $fillable = [
        'id_matkul','id_dosen'
        ];
    
        public function dosen()
        {
            return $this->belongsTo('App\dosen','nipdosenwali','id_dosen');
        }
}
