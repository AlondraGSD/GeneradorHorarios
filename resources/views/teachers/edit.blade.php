@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">

            <h3 class="mt-5 mb-3">Editar docente</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" maxlength="100"
                        value="{{ $teacher->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría:</label>
                    <select name="category" class="form-control" required>
                        <option value="Tiempo completo" {{ $teacher->category == 'Tiempo completo' ? 'selected' : '' }}>Tiempo completo</option>
                        <option value="Medio tiempo" {{ $teacher->category == 'Medio tiempo' ? 'selected' : '' }}>Medio tiempo</option>
                        <option value="Docentes de horas temporales sindicalizado" {{ $teacher->category == 'Docentes de horas temporales sindicalizado' ? 'selected' : '' }}>Docentes de horas temporales sindicalizado</option>
                        <option value="Docentes de horas temporales no sindicalizado" {{ $teacher->category == 'Docentes de horas temporales no sindicalizado' ? 'selected' : '' }}>Docentes de horas temporales no sindicalizado</option>
                        <option value="Docente de asignatura" {{ $teacher->category == 'Docente de asignatura' ? 'selected' : '' }}>Docente de asignatura</option>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary ms-2">Regresar</a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection