<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    protected $table = 'hutang';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_hutang',
        'jumlah_hutang',
        'id_print'
      ];

    public function trans(){
      return $this->belongsTo('App\Models\Printing');
    }
}
