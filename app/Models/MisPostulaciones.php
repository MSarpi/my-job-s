<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class MisPostulaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vacante_id',
        'cv'
    ];

    public function vacante() {
        return $this->hasMany(Vacante::class, 'id_vacante');
    }
    public function user(){
        return $this->hasMany(User::class, 'user_id'); //hasMany una vacante tiene muchos candidatos
    }
}
