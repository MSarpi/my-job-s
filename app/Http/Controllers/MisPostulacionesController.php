<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Postulante;
use App\Models\Candidato;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MisPostulacionesController extends Controller
{
    //dd
    public function index(Candidato $candidatos){
        // dd('Holi, soy trabajador');
        // $candidatos = Candidato::where('user_id', auth()->user()->id)->get();
        $candidatos =  DB::select('select c.id as id_candidato, c.created_at c_creacion, u.id as id_user, u.created_at as usuario_creado, v.created_at as vacante_creado, v.id as id_vacante, c.*, u.*, v.* from candidatos c, users u, vacantes v where c.user_id = u.id and c.vacante_id  
        = v.id and c.user_id = ?', [auth()->user()->id]);
        return view("mispostulaciones.index", [
            "candidatos" => $candidatos, 
        ]);
    }
}
