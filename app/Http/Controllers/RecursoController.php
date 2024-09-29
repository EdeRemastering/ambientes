<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recursos = Recurso::all();
        return view('recursos.index', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ambiente' => 'required|integer',
            'descripcion' => 'required|string',
            'estado' => 'required|integer'
        ]);

        try {
            Recurso::create($request->all());
            return redirect()->route('recursos.index')->with('success', 'Recurso creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el recurso.' . $e->getMessage());
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Recurso $recurso)
    {
        return view('recursos.show', compact('recurso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recurso = Recurso::findOrFail($id);
        return view('recursos.edit', compact('recurso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_ambiente' => 'required|integer',
            'descripcion' => 'required|string',
            'estado' => 'required|integer'
        ]);

        $recurso = Recurso::findOrFail($id);

        try {
            $recurso->update($request->all());
            return redirect()->route('recursos.index')->with('success', 'Recurso actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el recurso.' . $e->getMessage());
        }
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recurso = Recurso::findOrFail($id);
        try {
            $recurso->delete();
            return redirect()->route('recursos.index')->with('success', 'Recurso eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el recurso.' . $e->getMessage());
        }
     
    }
}
