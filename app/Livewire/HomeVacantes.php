<?php

namespace App\Livewire;
use App\Models\Vacante;
use Livewire\Component;
use Carbon\Carbon; // Importa la clase Carbon
class HomeVacantes extends Component
{
    public $termino;
    public $signo;
    public $categoria;
    public $horario;

    protected $listeners = ['terminosBusquedas' => 'buscar'];
    
    public function buscar($termino, $signo, $categoria, $horario){
        $this->termino = $termino; // Asignar el término de búsqueda al atributo correcto
        $this->signo = $signo; // Asignar el signo al atributo correcto
        $this->categoria = $categoria; // Asignar la categoría al atributo correcto
        $this->horario = $horario; // Asignar el horario al atributo correcto
    }
    public function render(){

    $fechaActual = Carbon::now()->format('Y-m-d');
    $vacantes = Vacante::when($this->termino, function($query){
        $query->where('titulo', 'LIKE', '%' . $this->termino . '%');
    })
    ->when($this->signo, function($query){
        $query->where('signo_id', $this->signo);
    })
    ->when($this->categoria, function($query){
        $query->where('categoria_id', $this->categoria);
    })
    ->when($this->horario, function($query){
        $query->where('horario_id', $this->horario);
    })
    ->where('publicado', 1) // Condición para mostrar solo vacantes con publicado = 2
    ->whereDate('expiracion', '>=', $fechaActual) // Condición para comparar la fecha de expiración con la fecha límite
    ->orderByDesc('created_at')
    ->paginate(20);
        
        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes,
        ]);
    }
}
