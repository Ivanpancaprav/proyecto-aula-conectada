<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Espacio_Didactico extends Model
{
    protected $fillable =['titulo','color'];

    public $timestamps = false;

    use HasFactory;

    public function bloques(){

        return $this->hasMany(Bloque::class,'id_espacio','id');
    }

}
