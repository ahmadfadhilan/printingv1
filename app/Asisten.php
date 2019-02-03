<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    protected $fillable = [
        'NIM',
        'nama'
    ];
    
    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa');
    }
    
    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi');
    }
    
}
