<?php

namespace App\Livewire;
use App\Models\categorias;
use App\Models\Horarios;
use App\Models\Signos;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $empresa;
    public $t_vacante;
    public $signo;
    public $salario;
    public $categoria;
    public $horario;
    public $last_day;
    public $descripcion;
    public $imagen;
    public $n_imagen;
    public $estado;

    use WithFileUploads;
    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id; //tomamos el id para que no se hagan problemas al momento de modificar
        $this->empresa = $vacante->empresa;
        $this->t_vacante = $vacante->titulo;
        $this->signo = $vacante->signo_id;
        $this->salario = $vacante->salario;
        $this->categoria = $vacante->categoria_id;
        $this->horario = $vacante->horario_id;
        $this->last_day = $vacante->expiracion;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
        $this->estado = $vacante->publicado;
    }


    protected $rules = [
        'empresa' => 'required|string',
        't_vacante' => 'required|string',
        'signo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'last_day' => 'required',
        'horario' => 'required',
        'descripcion' => 'required',
        'n_imagen' => 'nullable|image|max:2048',
        'estado' => 'required|in:1,2,3',
    ];


    public function editarVacante(){
        $datos = $this->validate();
        //si hay una imagen
        if($this->n_imagen){
            $imagen = $this->n_imagen->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        //encontrar vacante
        $vacante = Vacante::find($this->vacante_id);

        //Asignar valores
        $vacante->empresa = $datos['empresa'];
        $vacante->titulo = $datos['t_vacante'];
        $vacante->signo_id = $datos['signo'];
        $vacante->salario = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->horario_id = $datos['horario'];
        $vacante->expiracion = $datos['last_day'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        $vacante->publicado = $datos['estado'];
        // $vacante->imagen = $datos['last_imagenday'];
        $vacante->save();

        //Redireccionar
        session()->flash('mensaje','La vacante de actuailzo exitosamente');
        return redirect()->route('vacantes.index');
    }
    public function render()
    {
        $signopeso = Signos::all();
        $categorias = categorias::all();
        $horarios = Horarios::all();

        return view('livewire.editar-vacante', [
            'singnos' => $signopeso,
            'categorias' => $categorias,
            'horarios' => $horarios
        ]);
    }
}
