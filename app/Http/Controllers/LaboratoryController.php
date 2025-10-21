<?php

namespace App\Http\Controllers;
use App\Services\LaboratoryService;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    protected $service;

    public function __construct(LaboratoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $laboratories = $this->service->getAll();
        return view('laboratories.index', compact('laboratories'));
    }

    public function create()
    {
        return view('laboratories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $this->service->store($validatedData);

        return redirect()->route('laboratories.index')->with('success', 'Laboratorio creado correctamente.');
    }

    public function edit($id)
    {
        $laboratory = $this->service->find($id);
        return view('laboratories.edit', compact('laboratory'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $this->service->update($id, $validatedData);

        return redirect()->route('laboratories.index')->with('success', 'Laboratorio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $result = $this->service->delete($id);

        if ($result === 'foreign_key') {
            return redirect()->route('laboratories.index')->withErrors(['No se puede eliminar este laboratorio porque tiene clases asignadas.']);
        } elseif ($result === 'error') {
            return redirect()->route('laboratories.index')->withErrors(['No se ha podido eliminar el laboratorio.']);
        }

        return redirect()->route('laboratories.index')->with('success', 'Laboratorio eliminado correctamente.');
    }
}