<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use Illuminate\Http\Request;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novedades = Novedad::all();
        return view('novedades.index', compact('novedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('novedades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado_novedad' => 'required|integer',
            'fecha_solucion' => 'nullable|datetime'
        ]);


        try {
            Novedad::create($request->all());
            return redirect()->route('novedades.index')->with('success', 'Novedad creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear la novedad.' . $e->getMessage());
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Novedad $novedad)
    {
        return view('novedades.show', compact('novedad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $novedad = Novedad::findOrFail($id);
        return view('novedades.edit', compact('novedad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado_novedad' => 'required|integer',
            'fecha_solucion' => 'nullable|date'
        ]);

        try {
            $novedad = Novedad::findOrFail($id);
            $novedad->update($request->all());
            return redirect()->route('novedades.index')->with('success', 'Novedad actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar la novedad.' . $e->getMessage());
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $novedad = Novedad::findOrFail($id);
            $novedad->delete();
            return redirect()->route('novedades.index')->with('success', 'Novedad eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar la novedad.' . $e->getMessage());
        }
      
    }
}
