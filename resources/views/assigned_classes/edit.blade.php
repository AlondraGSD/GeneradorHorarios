@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">
            
            <h3 class="mt-5 mb-3">Editar Clase</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('assigned_classes.update', $assignedClass->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Materia:</label>
                    <select class="form-select" name="subject_id" required>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $assignedClass->subject_id == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grupo:</label>
                    <select class="form-select" name="group_id" required>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" {{ $assignedClass->group_id == $group->id ? 'selected' : '' }}>
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Docente:</label>
                    <select class="form-select" name="teacher_id" required>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $assignedClass->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ciclo:</label>
                    <input type="text" name="cycle_id" class="form-control" value="{{ $assignedClass->cycle_id }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prioridad:</label>
                    <select class="form-select" name="assignment_priority" required>
                        <option value="alta" {{ $assignedClass->assignment_priority == 'alta' ? 'selected' : '' }}>Alta</option>
                        <option value="baja" {{ $assignedClass->assignment_priority == 'baja' ? 'selected' : '' }}>Baja</option>
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('assigned_classes.index') }}" class="btn btn-secondary ms-2">Regresar</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection