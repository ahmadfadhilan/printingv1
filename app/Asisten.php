<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    protected $table = 'asisten';
    protected $primaryKey='id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
  
    protected $casts = [
      'nim' => 'string',
      'no_anggota' => 'string',
      'labor_id' => 'string',
      'instragram' => 'string',
      'facebook' => 'string',
      'google' => 'string',
      'twitter' => 'string',
    ];
  
    protected $fillable = [
      'nim',
      'no_anggota',
      'instragram',
      'facebook',
      'google',
      'twitter',
      'labor_id',
    ];
    
    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa');
    }
    
    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi');
    }
    
}
