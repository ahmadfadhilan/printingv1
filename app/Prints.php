<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prints extends Model
{
    protected $fillable = [
        'id_print',
        'nama',
        'harga'
    ];

    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi');
    }
}
