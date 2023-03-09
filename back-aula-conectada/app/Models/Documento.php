<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model{
    use HasFactory;
    protected $fillable = ['nombre','extension','id_bloque'];
    public $timestamps = false;

    public function bloque(){

        return $this->belongsTo(Bloque::class,'id','id');
    }

    
}
