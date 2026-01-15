<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    // Ejercicio: Mostrar listado de datos
    public function index()
    {
        $alumno = Alumno::all();
        return view('admin.alumno.index', compact('alumno'));
    }

    // Ejercicio: Mostrar formulario de creación
    public function create()
    {
        return view('admin.alumno.create');
    }

    // Ejercicio: Guardar datos en nueva tabla
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'modulo' => 'required|string|max:255',
            'calificacion' => 'required|integer',
        ]);

        Alumno::create($request->only(['name', 'modulo', 'calificacion']));

        return redirect()->route('admin.alumno.index')->with('success', 'Calificacion añadida correctamente.');
    }
}
