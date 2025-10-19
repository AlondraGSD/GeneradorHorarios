<?php

namespace App\Services;

use App\Models\Classroom;
use Illuminate\Database\QueryException;

class ClassroomService
{
    public function getAll()
    {
        return Classroom::all();
    }

    public function find($id)
    {
        return Classroom::findOrFail($id);
    }

    public function store(array $data)
    {
        return Classroom::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, array $data)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->update([
            'name' => $data['name'],
        ]);
        return $classroom;
    }

    public function delete($id)
    {
        try {
            $classroom = Classroom::findOrFail($id);
            $classroom->delete();
            return true;
        } catch (QueryException $e) {
            if ($e->getCode() === '23503') {
                return 'foreign_key';
            }
            return 'error';
        }
    }
}