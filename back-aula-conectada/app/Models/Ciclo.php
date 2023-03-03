<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'siglas',
        'nombre',
    ];

    public function usuarios() {
        return $this->belongsToMany(User::class, 'ciclos_usuarios',"id_user", "id_ciclo");
    }

    public function espacios() {
        return $this->belongsToMany(User::class, 'espacios_ciclos',"id_user", "id_espacio");
    }
}
