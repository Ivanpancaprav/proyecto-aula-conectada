<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{


    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'titulo',
        'id_espacio',
    ];


    public function espacio_didactico(){

            return $this->belongsTo(Espacio_Didactico::class,'id_espacio','id');
    }

    public function documentos(){

        return $this->hasMany(Documento::class,'id_bloque','id');
    }



    use HasFactory;


}
