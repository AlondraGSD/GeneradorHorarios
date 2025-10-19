<?php

namespace App\Http\Controllers;
use App\Services\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $service;

    public function __construct(GroupService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $groups = $this->service->getAll();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'semester' => 'required|integer',
        ]);

        $this->service->store($validatedData);

        return redirect()->route('groups.index')->with('success', 'Grupo creado correctamente.');
    }

    public function edit($id)
    {
        $group = $this->service->find($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'semester' => 'required|integer',
        ]);

        $this->service->update($id, $validatedData);

        return redirect()->route('groups.index')->with('success', 'Grupo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $result = $this->service->delete($id);

        if ($result === 'foreign_key') {
            return redirect()->route('groups.index')->withErrors(['No se puede eliminar este grupo porque tiene clases asignadas.']);
        } elseif ($result === 'error') {
            return redirect()->route('groups.index')->withErrors(['No se ha podido eliminar el grupo.']);
        }

        return redirect()->route('groups.index')->with('success', 'Grupo eliminado correctamente.');
    }
}