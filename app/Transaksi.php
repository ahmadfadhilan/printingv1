<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'id_trans',
        'nama_printing',
        'total',
        'id_asisten',
        'id_print'
    ];

    public function prints(){
        return $this->belongsTo('App\Models\Prints');
    }

    public function asisten(){
        return $this->belongsTo('App\Models\Asisten');
    }

    public function hutang(){
        return $this->hasMany('App\Models\Hutang');
    }
}
