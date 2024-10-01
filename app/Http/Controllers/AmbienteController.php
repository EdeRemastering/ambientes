<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Ambiente;

use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambientes = DB::table('ambientes')
        ->join('estado_ambiente', 'ambientes.estado', '=', 'estado_ambiente.id')
        ->join('red_de_formacion', 'ambientes.red_de_conocimiento', '=', 'red_de_formacion.id_area_formacion')
        ->select(
            'ambientes.id',
            'ambientes.numero',
            'ambientes.alias',
            'ambientes.capacidad',
            'ambientes.descripcion',
            'ambientes.tipo',
            'estado_ambiente.nombre AS estado_ambiente', // Nombre del estado
            'red_de_formacion.nombre AS nombre_red_de_conocimiento' // Nombre de la red de formación
        )
        ->get();
        return view('ambientes.index', compact('ambientes'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = DB::table('estado_ambiente')->select('id', 'nombre')->get();
        $redes_de_conocimiento = DB::table('red_de_formacion')->select('id_area_formacion', 'nombre')->get();
        return view('ambientes.create', compact('estados', 'redes_de_conocimiento'));
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
        $estados = DB::table('estado_ambiente')->select('id', 'nombre')->get();
        $redes_de_conocimiento = DB::table('red_de_formacion')->select('id_area_formacion', 'nombre')->get();
        return view('ambientes.edit', compact('ambiente', 'estados', 'redes_de_conocimiento'));
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
