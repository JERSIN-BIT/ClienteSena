@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>DETALLE DEL CENTRO DE FORMACIÓN</h1>

        <div class="card">

            <div class="card-body">

                <p><strong>ID:</strong> {{ $trainingCenter->id }}</p>

                <p><strong>Nombre:</strong> {{ $trainingCenter->name }}</p>

                <p><strong>Ubicación:</strong> {{ $trainingCenter->location }}</p>

                <a href="{{ route('trainingcenter.edit', $trainingCenter->id) }}" class="btn btn-warning">
                    Editar
                </a>

                <a href="{{ route('trainingcenter.index') }}" class="btn btn-secondary">
                    Volver
                </a>

            </div>

        </div>

    </div>
@endsection
