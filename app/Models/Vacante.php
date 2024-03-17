<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['expiracion'];
    protected $fillable = [
        'empresa',
        'titulo',
        'signo_id',
        'salario',
        'categoria_id',
        'horario_id',
        'expiracion',
        'descripcion',
        'imagen',
        'publicado',
        'user_id',
    ];

    public function signo(){
        return $this->belongsTo(Signos::class);

    }
    public function categoria(){
        return $this->belongsTo(categorias::class);
    }
    public function horario(){
        return $this->belongsTo(Horarios::class);
    }

    public function candidatos(){
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC'); //hasMany una vacante tiene muchos candidatos
    }
    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id'); //belongsTo una a una
    }
}

