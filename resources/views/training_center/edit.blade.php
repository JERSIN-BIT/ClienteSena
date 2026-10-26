@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>EDITAR CENTRO DE FORMACIÓN</h1>

        <form action="{{ route('training_center.update', $training_center['id'] ?? '') }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text" name="name" class="form-control" value="{{ $training_center['name'] ?? '' }}" required>

            </div>

            <div class="mb-3">

                <label>Ubicación</label>

                <input type="text" name="location" class="form-control" value="{{ $training_center['location'] ?? '' }}" required>

            </div>

            <button class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('training_center.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
