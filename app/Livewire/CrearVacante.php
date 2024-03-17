<?php

namespace App\Livewire;

use App\Models\categorias;
use App\Models\Horarios;
use App\Models\Signos;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    use WithFileUploads;
    public $empresa;
    public $t_vacante;
    public $signo;
    public $salario;
    public $categoria;
    public $horario;
    public $last_day;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'empresa' => 'required|string',
        't_vacante' => 'required',
        'signo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'last_day' => 'required',
        'horario' => 'required',
        'descripcion' => 'required',
        'imagen' => 'max:2048',
    ];

    public function crearVacante(){
        $datos = $this->validate();

        if ($this->imagen) {
            $imagen = $this->imagen->store('public/vacantes'); //rescatamos el nombre de la imagen
            $nombre_imagen = str_replace('public/vacantes/', '', $imagen); //recortamos el url y solo dejamos el nombre mas su extención

            Vacante::create([
                'empresa' => $datos['empresa'],
                'titulo' => $datos['t_vacante'],
                'signo_id' => $datos['signo'],
                'salario' => $datos['salario'],
                'categoria_id' => $datos['categoria'],
                'horario_id' => $datos['horario'],
                'expiracion' => $datos['last_day'],
                'descripcion' => $datos['descripcion'],
                'imagen' => $nombre_imagen,
                'user_id' => auth()->user()->id,
            ]);

        } else {
            Vacante::create([
                'empresa' => $datos['empresa'],
                'titulo' => $datos['t_vacante'],
                'signo_id' => $datos['signo'],
                'salario' => $datos['salario'],
                'categoria_id' => $datos['categoria'],
                'horario_id' => $datos['horario'],
                'expiracion' => $datos['last_day'],
                'descripcion' => $datos['descripcion'],
                'imagen' => 'no_image',
                'user_id' => auth()->user()->id,
            ]);
        }

        session()->flash('mensaje','La vacante se publico correctamente');
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $signopeso = Signos::all();
        $categorias = categorias::all();
        $horarios = Horarios::all();

        return view('livewire.crear-vacante', [
            'singnos' => $signopeso,
            'categorias' => $categorias,
            'horarios' => $horarios
        ]);
    }
}
