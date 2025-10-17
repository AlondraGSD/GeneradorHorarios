<?php

namespace App\Services;

use App\Models\Group;
use Illuminate\Database\QueryException;

class GroupService
{
    public function getAll()
    {
        return Group::all();
    }

    public function find($id)
    {
        return Group::findOrFail($id);
    }

    public function store(array $data)
    {
        return Group::create([
            'name' => $data['name'],
            'semester' => $data['semester'],
        ]);
    }

    public function update($id, array $data)
    {
        $group = Group::findOrFail($id);
        $group->update([
            'name' => $data['name'],
            'semester' => $data['semester'],
        ]);
        return $group;
    }

    public function delete($id)
    {
        try {
            $group = Group::findOrFail($id);
            $group->delete();
            return true;
        } catch (QueryException $e) {
            if ($e->getCode() === '23503') {
                return 'foreign_key';
            }
            return 'error';
        }
    }
}