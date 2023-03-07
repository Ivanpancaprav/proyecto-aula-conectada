<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    protected $table = "ciclos";

    public $timestamps = false;

    protected $fillable = [
        'siglas',
        'nombre',
    ];

    public function usuarios() {
        return $this->belongsToMany(User::class, 'ciclos_usuarios',"id_user", "id_ciclo");
    }

    public function espacios() {
        return $this->belongsToMany(Espacio_Didactico::class, 'espacios_ciclos',"id_espacio", "id_ciclo");
    }
}
