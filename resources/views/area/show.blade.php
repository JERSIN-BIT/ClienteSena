@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>DETALLE DEL ÁREA</h1>

        <div class="card">

            <div class="card-body">

                <p><strong>ID:</strong> {{ $area->id }}</p>

                <p><strong>Nombre:</strong> {{ $area->name }}</p>

                @auth
                    <a href="{{ route('area.edit', $area->id) }}" class="btn btn-warning">
                        Editar
                    </a>
                @endauth

                <a href="{{ route('area.index') }}" class="btn btn-secondary">
                    Volver
                </a>

            </div>

        </div>

    </div>
@endsection
