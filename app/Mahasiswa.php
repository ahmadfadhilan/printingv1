<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public function asisten(){
        return $this->hasOne('App\Models\Asisten');
      }
}
