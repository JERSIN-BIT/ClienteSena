@extends('layouts.app')

@section('content')
    <div class="container training_center-list">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>LISTAR CENTROS DE FORMACIÓN</h1>

            @auth
                <a href="{{ route('training_center.create') }}" class="btn btn-success">
                    + Nuevo centro
                </a>
            @endauth

        </div>

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Detalle</th>
                    @auth
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    @endauth
                </tr>
            </thead>

            <tbody>

                @forelse(($trainingCenters ?? []) as $trainingCenter)
                    <tr>

                        <td>{{ $trainingCenter['id'] ?? '' }}</td>

                        <td>{{ $trainingCenter['name'] ?? '' }}</td>

                        <td>{{ $trainingCenter['location'] ?? '' }}</td>

                        <td>
                            <a href="{{ route('training_center.show', $trainingCenter['id'] ?? '') }}"
                                class="btn btn-info btn-sm text-white">
                                Mostrar
                            </a>
                        </td>

                        @auth
                            <td>
                                <a href="{{ route('training_center.edit', $trainingCenter['id'] ?? '') }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('training_center.destroy', $trainingCenter['id'] ?? '') }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar este centro?')">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        @endauth

                    </tr>

                @empty

                    <tr>
                        <td colspan="{{ auth()->check() ? 6 : 4 }}" class="text-center">
                            No hay centros registrados.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
