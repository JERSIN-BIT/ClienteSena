@extends('layouts.app')

@section('content')
    <div class="container computer-list">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>LISTAR COMPUTADORES</h1>

            @auth
                <a href="{{ route('computer.create') }}" class="btn btn-success">
                    + Nuevo computador
                </a>
            @endauth

        </div>

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Número</th>
                    <th>Marca</th>
                    <th>Detalle</th>
                    @auth
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    @endauth
                </tr>
            </thead>

            <tbody>

                @forelse($computers as $computer)
                    <tr>

                        <td>{{ $computer->id }}</td>
                        <td>{{ $computer->number }}</td>
                        <td>{{ $computer->brand }}</td>

                        <td>
                            <a href="{{ route('computer.show', $computer->id) }}" class="btn btn-info btn-sm text-white">
                                Mostrar
                            </a>
                        </td>

                        @auth
                            <td>
                                <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('computer.destroy', $computer->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar este computador?')">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        @endauth

                    </tr>

                @empty

                    <tr>
                        <td colspan="{{ auth()->check() ? 6 : 4 }}" class="text-center">
                            No hay computadores registrados.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
@endsection
