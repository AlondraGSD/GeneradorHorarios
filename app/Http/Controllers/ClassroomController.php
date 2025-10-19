<?php

namespace App\Http\Controllers;
use App\Services\ClassroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    protected $service;

    public function __construct(ClassroomService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $classrooms = $this->service->getAll();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $this->service->store($validatedData);

        return redirect()->route('classrooms.index')->with('success', 'Salón creado correctamente.');
    }

    public function edit($id)
    {
        $classroom = $this->service->find($id);
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $this->service->update($id, $validatedData);

        return redirect()->route('classrooms.index')->with('success', 'Salón actualizado correctamente.');
    }

    public function destroy($id)
    {
        $result = $this->service->delete($id);

        if ($result === 'foreign_key') {
            return redirect()->route('classrooms.index')->withErrors(['No se puede eliminar este salón porque tiene clases asignadas.']);
        } elseif ($result === 'error') {
            return redirect()->route('classrooms.index')->withErrors(['No se ha podido eliminar el salón.']);
        }

        return redirect()->route('classrooms.index')->with('success', 'Salón eliminado correctamente.');
    }
}