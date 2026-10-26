@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>DETALLE DEL CENTRO DE FORMACIÓN</h1>

        <div class="card">

            <div class="card-body">

                <p><strong>ID:</strong> {{ $training_center['id'] ?? '' }}</p>

                <p><strong>Nombre:</strong> {{ $training_center['name'] ?? '' }}</p>

                <p><strong>Ubicación:</strong> {{ $training_center['location'] ?? '' }}</p>

                @auth
                    <a href="{{ route('training_center.edit', $training_center['id'] ?? '') }}" class="btn btn-warning">
                        Editar
                    </a>
                @endauth

                <a href="{{ route('training_center.index') }}" class="btn btn-secondary">
                    Volver
                </a>

            </div>

        </div>

    </div>
@endsection
