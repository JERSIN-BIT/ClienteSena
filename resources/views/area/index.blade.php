@extends('layouts.app')

@section('content')
    <div class="container area-list">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>LISTAR ÁREAS</h1>

            @auth
                <a href="{{ route('area.create') }}" class="btn btn-success">
                    + Nueva área
                </a>
            @endauth

        </div>

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    @auth
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    @endauth
                </tr>
            </thead>

            <tbody>

                @forelse(($areas ?? []) as $area)
                    <tr>

                        <td>{{ $area['id'] ?? '' }}</td>
                        <td>{{ $area['name'] ?? '' }}</td>

                        <td>
                            <a href="{{ route('area.show', $area['id'] ?? '') }}" class="btn btn-info btn-sm text-white">
                                Mostrar
                            </a>
                        </td>

                        @auth
                            <td>
                                <a href="{{ route('area.edit', $area['id'] ?? '') }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('area.destroy', $area['id'] ?? '') }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar esta área?')">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        @endauth

                    </tr>

                @empty

                    <tr>
                        <td colspan="{{ auth()->check() ? 5 : 3 }}" class="text-center">
                            No hay áreas registradas.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
