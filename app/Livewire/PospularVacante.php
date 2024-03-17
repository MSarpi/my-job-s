<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PospularVacante extends Component
{
    use WithFileUploads; //CONFIGURA LA SECCION DE SUBIDAS DE ARCHIVOS
    public $vacante;

    public $cv;

    protected $rules = [
        "cv"=> "required|mimes:pdf",
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }
    // public function mount(Vacante $vacante)
    // {
    //     dd($vacante);
    // };

    public function postularme(){
        $this->validate();

        if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('error', 'Ya postulaste a esta vacante anteriormente');
        } else {        // dd("postulo");
            $cv = $this->cv->store('public/cv'); //rescatamos el nombre de la imagen
            $nombre_pdf = str_replace('public/cv/', '', $cv); //recortamos el url y solo dejamos el nombre mas su extención

            //almacenar
            $this->vacante->candidatos()->create([
                'user_id' => auth()->user()->id,
                'cv' => $nombre_pdf,
            ]);

            $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));


            //Crear notificaciones

            session()->flash('mensaje','Tú Cv se envio correctamente! Mucha suerte');

            session()->put('postulado', true);
            return redirect()->back();}

    }


    public function render()
    {
        return view('livewire.pospular-vacante');
    }
}
