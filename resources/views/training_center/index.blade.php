@extends('layouts.app')

@section('content')
    <div class="container training_center-list">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>LISTAR CENTROS DE FORMACIÓN</h1>

            <a href="{{ route('trainingcenter.create') }}" class="btn btn-success">
                + Nuevo centro
            </a>

        </div>

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Detalle</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>

                @forelse($trainingCenters as $trainingCenter)
                    <tr>

                        <td>{{ $trainingCenter->id }}</td>

                        <td>{{ $trainingCenter->name }}</td>

                        <td>{{ $trainingCenter->location }}</td>

                        <td>
                            <a href="{{ route('trainingcenter.show', $trainingCenter->id) }}"
                                class="btn btn-info btn-sm text-white">
                                Mostrar
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('trainingcenter.edit', $trainingCenter->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('trainingcenter.destroy', $trainingCenter->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este centro?')">
                                    Eliminar
                                </button>

                            </form>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No hay centros registrados.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
