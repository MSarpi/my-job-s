<?php

namespace App\Livewire;
use App\Models\Signos;
use App\Models\categorias;
use App\Models\Horarios;
use Livewire\Component;

class FiltrarVacantes extends Component
{

    public $termino;
    public $signo;
    public $categoria;
    public $horario;

    public function leerDatos(){
        $this->dispatch('terminosBusquedas', $this->termino, $this->signo, $this->categoria, $this->horario);
    }
    
    public function render()
    {
        $signos = Signos::all();
        $categorias = categorias::all();
        $horarios = Horarios::all();

        return view('livewire.filtrar-vacantes', [
            'signos' => $signos,
            'categorias' => $categorias,
            'horarios' => $horarios,
        ]);
    }
}
