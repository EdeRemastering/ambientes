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
            'estado' => 'required|in:activo,inactivo'
        ]);

        Recurso::create($request->all());
        return redirect()->route('recursos.index')->with('success', 'Recurso creado exitosamente.');
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
            'estado' => 'required|in:activo,inactivo'
        ]);

        $recurso = Recurso::findOrFail($id);
        $recurso->update($request->all());
        return redirect()->route('recursos.index')->with('success', 'Recurso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recurso = Recurso::findOrFail($id);
        $recurso->delete();
        return redirect()->route('recursos.index')->with('success', 'Recurso eliminado exitosamente.');
    }
}
