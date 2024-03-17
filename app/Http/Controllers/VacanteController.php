<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->authorize("viewAny", Vacante::class);
        return view("reclutador.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("create");
        $this->authorize("create", Vacante::class);
         return view("reclutador.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        //
        return view("reclutador.show", ['vacante' => $vacante]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //
        $this->authorize('update', $vacante);
        return view('reclutador.editar' , [
            'vacante'=> $vacante,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
