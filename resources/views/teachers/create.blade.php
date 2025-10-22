@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">

            <h3 class="mt-5 mb-3">Nuevo docente</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" maxlength="100" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría:</label>
                    <select name="category" class="form-control" required>
                        <option value="" selected>Selecciona una categoría</option>
                        <option value="Tiempo completo">Tiempo completo</option>
                        <option value="Medio tiempo">Medio tiempo</option>
                        <option value="Docentes de horas temporales sindicalizado">Docentes de horas temporales sindicalizado</option>
                        <option value="Docentes de horas temporales no sindicalizado">Docentes de horas temporales no sindicalizado</option>
                        <option value="Docente de asignatura">Docente de asignatura</option>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary ms-2">Regresar</a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection