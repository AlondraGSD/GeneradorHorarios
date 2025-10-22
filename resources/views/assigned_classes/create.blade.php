@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">
            
            <h3 class="mt-5 mb-3">Nueva Clase</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('assigned_classes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Materia:</label>
                    <select class="form-select" name="subject_id" required>
                        <option value="" disabled selected>Selecciona una materia</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grupo:</label>
                    <select class="form-select" name="group_id" required>
                        <option value="" disabled selected>Selecciona un grupo</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Docente:</label>
                    <select class="form-select" name="teacher_id" required>
                        <option value="" disabled selected>Selecciona un docente</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ciclo:</label>
                    <input type="text" name="cycle_id" class="form-control" placeholder="2025">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prioridad:</label>
                    <select class="form-select" name="assignment_priority" required>
                        <option value="alta">Alta</option>
                        <option value="baja" selected>Baja</option>
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('assigned_classes.index') }}" class="btn btn-secondary ms-2">Regresar</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection