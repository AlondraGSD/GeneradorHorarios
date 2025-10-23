<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Laboratory;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Teacher;
use App\Models\Cycle;

class AssignedLab extends Model
{
    protected $table = 'assigned_labs';

    protected $fillable = [
        'laboratory_id',
        'subject_id',
        'group_id',
        'teacher_id',
        'cycle_id',
        'assignment_priority',
    ];

    public $timestamps = true;

    // Relaciones
    public function laboratory() {
        return $this->belongsTo(Laboratory::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
