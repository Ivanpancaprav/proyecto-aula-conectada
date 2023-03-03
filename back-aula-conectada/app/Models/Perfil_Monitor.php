<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil_Monitor extends Model
{
    use HasFactory;

    protected $table = "perfiles_monitor";

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'FC',
        'CO2',
        'TA_D',
        'TA_S',
        'SATO2',
        'id_user',
    ];

    public function usuario() {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
