@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">

            <h3 class="mt-5 mb-3">Nueva materia</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('subjects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" maxlength="100" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semestre:</label>
                    <input type="number" name="semester" class="form-control" max="9" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horas por semana:</label>
                    <input type="number" name="hours_week" class="form-control" max="6" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('subjects.index') }}" class="btn btn-secondary ms-2">Regresar</a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection