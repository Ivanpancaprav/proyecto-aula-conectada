<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'apellido1',
        'apellido2',
        'role',
        'tipo_documento',
        'num_documento',
    ];

    protected $hidden = [
        'password',
    ];

    public function ciclos() {
        return $this->belongsToMany(Ciclo::class, 'ciclos_usuarios', "id_user","id_ciclo");
    }

    public function monitor(){
        return $this->hasOne(Phone::class,'id_user', 'id');
    }

    public function perfiles_monitor() {
        return $this->hasMany(Perfil_Monitor::class, 'id_user', 'id');
    }

}
