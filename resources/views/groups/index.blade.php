@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-5 mb-4">
        <div class="col">
            <h3>Grupos</h3>
        </div>
        <div class="col">
            <a href="{{ route('groups.create') }}" class="btn btn-primary mb-4 float-end">
                Nuevo grupo <i class="bi bi-plus"></i>
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="row">
            <div class="col">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Semestre</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->semester }}</td>
                        <td class="text-center">
                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Está seguro de eliminar el grupo: {{ $group->name }}?')">
                                    <i class="bi bi-archive"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection