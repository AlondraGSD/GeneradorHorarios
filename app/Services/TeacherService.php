<?php

namespace App\Services;

use App\Models\Teacher;
use Illuminate\Database\QueryException;

class TeacherService
{
    public function getAll()
    {
        return Teacher::all();
    }

    public function find($id)
    {
        return Teacher::findOrFail($id);
    }

    public function store(array $data)
    {
        return Teacher::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, array $data)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update([
            'name' => $data['name'],
        ]);
        return $teacher;
    }

    public function delete($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->delete();
            return true;
        } catch (QueryException $e) {
            if ($e->getCode() === '23503') {
                return 'foreign_key';
            }
            return 'error';
        }
    }
}