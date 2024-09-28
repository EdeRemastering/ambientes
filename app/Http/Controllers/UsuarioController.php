<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
     // Mostrar un listado de usuarios
    // Controlador de Usuarios
public function index(Request $request)
{
    // Obtén todos los usuarios con paginación
    $usuarios = User::All(); 

    return view('usuarios.index', compact('usuarios'));
}

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    public function show($id)
{
    $user = User::findOrFail($id);
    return view('usuarios.show', compact('user'));
}

    // Almacenar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    // Mostrar el formulario para editar un usuario existente
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit', compact('user'));
    }

    // Actualizar un usuario existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

     // Método para eliminar un usuario
     public function destroy($id)
     {
         $user = User::findOrFail($id); // Encontrar al usuario por ID o mostrar un error 404 si no se encuentra
         $user->delete(); // Eliminar el usuario
 
         return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.');
     } 
}
