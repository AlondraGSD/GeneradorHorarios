<?php

namespace App\Http\Controllers;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $service;

    public function __construct(SubjectService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $subjects = $this->service->getAll();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'semester' => 'required|integer',
            'hours_week' => 'required|integer',
        ]);

        $this->service->store($validatedData);

        return redirect()->route('subjects.index')->with('success', 'Materia creada correctamente.');
    }

    public function edit($id)
    {
        $subject = $this->service->find($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'semester' => 'required|integer',
            'hours_week' => 'required|integer',
        ]);

        $this->service->update($id, $validatedData);

        return redirect()->route('subjects.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $result = $this->service->delete($id);

        if ($result === 'foreign_key') {
            return redirect()->route('subjects.index')->withErrors(['No se puede eliminar esta materia porque tiene clases asignadas.']);
        } elseif ($result === 'error') {
            return redirect()->route('subjects.index')->withErrors(['No se ha podido eliminar la materia.']);
        }

        return redirect()->route('subjects.index')->with('success', 'Materia eliminada correctamente.');
    }
}