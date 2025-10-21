<?php

namespace App\Services;

use App\Models\Laboratory;
use Illuminate\Database\QueryException;

class LaboratoryService
{
    public function getAll()
    {
        return Laboratory::all();
    }

    public function find($id)
    {
        return Laboratory::findOrFail($id);
    }

    public function store(array $data)
    {
        return Laboratory::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, array $data)
    {
        $laboratory = Laboratory::findOrFail($id);
        $laboratory->update([
            'name' => $data['name'],
        ]);
        return $laboratory;
    }

    public function delete($id)
    {
        try {
            $laboratory = Laboratory::findOrFail($id);
            $laboratory->delete();
            return true;
        } catch (QueryException $e) {
            if ($e->getCode() === '23503') {
                return 'foreign_key';
            }
            return 'error';
        }
    }
}