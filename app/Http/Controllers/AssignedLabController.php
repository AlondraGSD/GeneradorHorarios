<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratory;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Teacher;
use App\Services\AssignedLabService;

class AssignedLabController extends Controller
{
    protected $service;

    public function __construct(AssignedLabService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $assignedLabs = $this->service->getAll();
        return view('assigned_labs.index', compact('assignedLabs'));
    }

    public function create()
    {
        $laboratories = Laboratory::all();
        $subjects = Subject::all();
        $groups = Group::all();
        $teachers = Teacher::all();

        return view('assigned_labs.create', compact('laboratories', 'subjects', 'groups', 'teachers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'laboratory_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'group_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'cycle_id' => 'required|integer',
            'assignment_priority' => 'required|in:alta,baja',
        ]);

        $this->service->store($data);

        return redirect()->route('assigned_labs.index')->with('success', 'Laboratorio asignado correctamente.');
    }

    public function edit($id)
    {
        $assignedLab = $this->service->find($id);
        $laboratories = Laboratory::all();
        $subjects = Subject::all();
        $groups = Group::all();
        $teachers = Teacher::all();

        return view('assigned_labs.edit', compact('assignedLab', 'laboratories', 'subjects', 'groups', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'laboratory_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'group_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'cycle_id' => 'required|integer',
            'assignment_priority' => 'required|in:alta,baja',
        ]);

        $this->service->update($id, $data);

        return redirect()->route('assigned_labs.index')->with('success', 'Laboratorio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('assigned_labs.index')->with('success', 'Laboratorio eliminado correctamente.');
    }
}
