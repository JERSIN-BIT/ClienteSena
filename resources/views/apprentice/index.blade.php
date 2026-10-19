@extends('layouts.app')

@section('content')
    <div class="container apprentice-list">

        <div class="page-header">
            <div>
                <span class="page-label">ADMINISTRACIÓN</span>
                <h1>Aprendices</h1>
                <p>Consulta y administra la información de los aprendices registrados.</p>
            </div>

            <a href="{{ route('apprentice.create') }}" class="btn btn-success">
                + Nuevo aprendiz
            </a>
        </div>

        <div class="table-card">

            <div class="table-title">
                <h2>Listado de aprendices</h2>
                <span>Información registrada</span>
            </div>

            <div class="table-responsive">

                <table class="table apprentice-table">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Número de celular</th>
                            <th>Id-Curso</th>
                            <th>Id-Computador</th>
                            <th>Detalle</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($apprentices as $apprentice)
                            <tr>

                                <td>{{ $apprentice->id }}</td>

                                <td>
                                    <strong>{{ $apprentice->name }}</strong>
                                </td>

                                <td>{{ $apprentice->email }}</td>

                                <td>{{ $apprentice->cell_number }}</td>

                                <td>{{ $apprentice->course_id }}</td>

                                <td>{{ $apprentice->computer_id }}</td>

                                <td>
                                    <a href="{{ route('apprentice.show', $apprentice->id) }}"
                                        class="btn btn-info btn-sm text-white">
                                        Mostrar
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('apprentice.edit', $apprentice->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Editar
                                    </a>
                                </td>

                                <td>

                                    <form action="{{ route('apprentice.destroy', $apprentice->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Seguro que deseas eliminar este aprendiz?')">
                                            Eliminar
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9" class="empty-message">
                                    No hay aprendices registrados.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
