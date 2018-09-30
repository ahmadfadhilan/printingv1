<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    protected $fillable = [
        'NIM',
        'nama'
    ];

    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi');
      }
}
