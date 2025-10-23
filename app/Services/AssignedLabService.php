<?php

namespace App\Services;

use App\Models\AssignedLab;

class AssignedLabService
{
    public function getAll() {
        return AssignedLab::with(['laboratory', 'subject', 'group', 'teacher'])->get();
    }

    public function find($id) {
        return AssignedLab::findOrFail($id);
    }

    public function store(array $data) {
        return AssignedLab::create($data);
    }

    public function update($id, array $data) {
        $ac = AssignedLab::findOrFail($id);
        $ac->update($data);
        return $ac;
    }

    public function delete($id) {
        $ac = AssignedLab::findOrFail($id);
        $ac->delete();
        return true;
    }
}