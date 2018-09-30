<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    protected $fillable = [
        'id_hutang',
        'jumlah_hutang',
        'status',
        'id_trans'
      ];

    public function trans(){
      return $this->belongsTo('App\Models\Transaksi');
    }
}
