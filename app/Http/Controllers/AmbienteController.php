<?php

namespace App\Http\Controllers;
use App\Models\Ambiente;

use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambientes = Ambiente::All();
        return view('ambientes.index', compact('ambientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ambientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'numero' => 'required',
            'alias' => 'required',
            'capacidad' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
            'estado' => 'required|in:1,2',
            'red_de_conocimiento' => 'required'
        ]);

        try {
            Ambiente::create($request->all());
            return redirect()->route('ambientes.index')->with('succes', 'Ambiente creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el ambiente.' . $e->getMessage()) ;
        }

        
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ambientes.show', compact('ambiente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ambiente = Ambiente::findOrFail($id);
        return view('ambientes.edit', compact('ambiente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'numero',
            'alias',
            'capacidad',
            'descripcion',
            'tipo',
            'estado',
            'red_de_conocimiento'
        ]);

        try {
            $ambiente = Ambiente::findOrFail($id);
            $ambiente->update($request->all());
            return redirect()->route('ambientes.index')->with('succes', 'Ambiente actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el ambiente.' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $ambiente = Ambiente::findOrFail($id);
            $ambiente->delete();
            return redirect()->route('ambientes.index')->with('success', 'Ambiente eliminado exitosamente. ');
      
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el ambiente.' . $e->getMessage());
        }
    }
}
