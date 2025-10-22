<?php

namespace App\Http\Controllers;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $service;

    public function __construct(TeacherService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $teachers = $this->service->getAll();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:Tiempo completo,Medio tiempo,Docentes de horas temporales sindicalizado,Docentes de horas temporales no sindicalizado,Docente de asignatura',
        ]);

        $this->service->store($validatedData);

        return redirect()->route('teachers.index')->with('success', 'Maestro creado correctamente.');
    }

    public function edit($id)
    {
        $teacher = $this->service->find($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $this->service->update($id, $validatedData);

        return redirect()->route('teachers.index')->with('success', 'Maestro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $result = $this->service->delete($id);

        if ($result === 'foreign_key') {
            return redirect()->route('teachers.index')->withErrors(['No se puede eliminar a este maestro porque tiene clases asignadas.']);
        } elseif ($result === 'error') {
            return redirect()->route('teachers.index')->withErrors(['No se ha podido eliminar el maestro.']);
        }

        return redirect()->route('teachers.index')->with('success', 'Maestro eliminado correctamente.');
    }
}
