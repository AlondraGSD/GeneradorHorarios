@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">

            <h3 class="mt-5 mb-3">Editar salón</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" maxlength="20" value="{{ $classroom->name }}" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('classrooms.index') }}" class="btn btn-secondary ms-2">Regresar</a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection