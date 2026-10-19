@extends('layouts.app')

@section('content')
    <div class="container area-list">

        <div class="mb-4">
            <h1>LISTAR ÁREAS</h1>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                </tr>
            </thead>

            <tbody>
                @forelse($areas as $area)
                    <tr>
                        <td>{{ $area['id'] }}</td>
                        <td>{{ $area['name'] }}</td>

                        <td>
                            <a href="{{ route('area.show', $area['id']) }}" class="btn btn-info btn-sm text-white">
                                Mostrar
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No hay áreas registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
