<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printing extends Model
{
    protected $table = 'printing';
    protected $primaryKey = 'id';

    public function asisten(){
        return $this->belongsTo('App\Models\Asisten');
    }

    public function hutang(){
        return $this->hasMany('App\Models\Hutang');
    }
}
