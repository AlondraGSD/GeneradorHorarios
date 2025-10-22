@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-5 mb-4">
        <div class="col">
            <h3>Clases Asignadas</h3>
        </div>
        <div class="col">
            <a href="{{ route('assigned_classes.create') }}" class="btn btn-primary mb-4 float-end">
                Nueva clase <i class="bi bi-plus"></i>
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Materia</th>
                <th>Grupo</th>
                <th>Docente</th>
                <th>Ciclo</th>
                <th>Prioridad</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignedClasses as $ac)
            <tr>
                <td>{{ $ac->id }}</td>
                <td>{{ $ac->subject->name }}</td>
                <td>{{ $ac->group->name }}</td>
                <td>{{ $ac->teacher->name }}</td>
                <td>{{ $ac->cycle_id }}</td>
                <td>{{ $ac->assignment_priority }}</td>
                <td class="text-center">
                    <a href="{{ route('assigned_classes.edit', $ac->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('assigned_classes.destroy', $ac->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('¿Está seguro de eliminar esta clase?')">
                            <i class="bi bi-archive"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection