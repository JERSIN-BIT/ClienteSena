@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>EDITAR CENTRO DE FORMACIÓN</h1>

        <form action="{{ route('trainingcenter.update', $trainingCenter->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text" name="name" class="form-control" value="{{ $trainingCenter->name }}" required>

            </div>

            <div class="mb-3">

                <label>Ubicación</label>

                <input type="text" name="location" class="form-control" value="{{ $trainingCenter->location }}" required>

            </div>

            <button class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('trainingcenter.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
