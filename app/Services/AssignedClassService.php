<?php

namespace App\Services;

use App\Models\AssignedClass;

class AssignedClassService
{
    public function getAll() {
        return AssignedClass::with(['subject', 'group', 'teacher'])->get();
    }

    public function find($id) {
        return AssignedClass::findOrFail($id);
    }

    public function store(array $data) {
        return AssignedClass::create($data);
    }

    public function update($id, array $data) {
        $ac = AssignedClass::findOrFail($id);
        $ac->update($data);
        return $ac;
    }

    public function delete($id) {
        $ac = AssignedClass::findOrFail($id);
        $ac->delete();
        return true;
    }
}