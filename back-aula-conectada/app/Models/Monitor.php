<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;

    protected $table = "monitores";

    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'id_user',
    ];

    public function usuario() {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
