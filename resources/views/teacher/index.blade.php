@extends('layouts.app')

@section('content')
    <div class="container teacher-list">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>LISTAR INSTRUCTORES</h1>

            @auth
                <a href="{{ route('teacher.create') }}" class="btn btn-success">
                    + Nuevo instructor
                </a>
            @endauth

        </div>

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Área</th>
                    <th>Centro</th>
                    <th>Detalle</th>
                    @auth
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    @endauth
                </tr>
            </thead>

            <tbody>

                @forelse(($teachers ?? []) as $teacher)
                    <tr>

                        <td>{{ $teacher['id'] ?? '' }}</td>
                        <td>{{ $teacher['name'] ?? '' }}</td>
                        <td>{{ $teacher['email'] ?? '' }}</td>
                        <td>{{ $teacher['area_id'] ?? '' }}</td>
                        <td>{{ $teacher['training_center_id'] ?? '' }}</td>

                        <td>
                            <a href="{{ route('teacher.show', $teacher['id'] ?? '') }}" class="btn btn-info btn-sm text-white">
                                Mostrar
                            </a>
                        </td>

                        @auth
                            <td>
                                <a href="{{ route('teacher.edit', $teacher['id'] ?? '') }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('teacher.destroy', $teacher['id'] ?? '') }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar este instructor?')">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        @endauth

                    </tr>

                @empty

                    <tr>
                        <td colspan="{{ auth()->check() ? 8 : 6 }}" class="text-center">
                            No hay instructores registrados.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
