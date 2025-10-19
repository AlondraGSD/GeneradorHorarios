@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">

            <h3 class="mt-5 mb-3">Editar materia</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" maxlength="100" value="{{ $subject->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semestre:</label>
                    <input type="number" name="semester" class="form-control" max="9" value="{{ $subject->semester }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horas por semana:</label>
                    <input type="number" name="hours_week" class="form-control" max="6" value="{{ $subject->hours_week }}" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('subjects.index') }}" class="btn btn-secondary ms-2">Regresar</a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection