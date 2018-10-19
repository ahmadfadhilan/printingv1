<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'id_trans',
        'nama_printing',
        'total',
        'id_asisten'
    ];

    public function asisten(){
        return $this->belongsTo('App\Models\Asisten');
    }

    public function hutang(){
        return $this->hasMany('App\Models\Hutang');
    }
}
