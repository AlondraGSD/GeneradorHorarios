<?php

namespace App\Services;

use App\Models\Subject;
use Illuminate\Database\QueryException;

class SubjectService
{
    public function getAll()
    {
        return Subject::all();
    }

    public function find($id)
    {
        return Subject::findOrFail($id);
    }

    public function store(array $data)
    {
        return Subject::create([
            'name' => $data['name'],
            'semester' => $data['semester'],
            'hours_week' => $data['hours_week'],
        ]);
    }

    public function update($id, array $data)
    {
        $subject = Subject::findOrFail($id);
        $subject->update([
            'name' => $data['name'],
            'semester' => $data['semester'],
            'hours_week' => $data['hours_week'],
        ]);
        return $subject;
    }

    public function delete($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $subject->delete();
            return true;
        } catch (QueryException $e) {
            if ($e->getCode() === '23503') {
                return 'foreign_key';
            }
            return 'error';
        }
    }
}