<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Teacher;
use App\Services\AssignedClassService;

class AssignedClassController extends Controller
{
    protected $service;

    public function __construct(AssignedClassService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $assignedClasses = $this->service->getAll();
        return view('assigned_classes.index', compact('assignedClasses'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $groups = Group::all();
        $teachers = Teacher::all();

        return view('assigned_classes.create', compact('subjects', 'groups', 'teachers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject_id' => 'required|integer',
            'group_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'cycle_id' => 'required|integer',
            'assignment_priority' => 'required|in:alta,baja',
        ]);

        $this->service->store($data);

        return redirect()->route('assigned_classes.index')->with('success', 'Clase asignada correctamente.');
    }

    public function edit($id)
    {
        $assignedClass = $this->service->find($id);
        $subjects = Subject::all();
        $groups = Group::all();
        $teachers = Teacher::all();

        return view('assigned_classes.edit', compact('assignedClass', 'subjects', 'groups', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'subject_id' => 'required|integer',
            'group_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'cycle_id' => 'required|integer',
            'assignment_priority' => 'required|in:alta,baja',
        ]);

        $this->service->update($id, $data);

        return redirect()->route('assigned_classes.index')->with('success', 'Clase actualizada correctamente.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('assigned_classes.index')->with('success', 'Clase eliminada correctamente.');
    }
}
