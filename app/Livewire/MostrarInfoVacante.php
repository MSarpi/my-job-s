<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarInfoVacante extends Component
{
    public $vacante;
    public function render()
    {
        return view('livewire.mostrar-info-vacante');
    }
}
