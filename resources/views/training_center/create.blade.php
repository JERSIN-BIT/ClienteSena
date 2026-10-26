@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>CREAR CENTRO DE FORMACIÓN</h1>

        <form action="{{ route('training_center.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text" name="name" class="form-control" required>

            </div>

            <div class="mb-3">

                <label>Ubicación</label>

                <input type="text" name="location" class="form-control" required>

            </div>

            <button class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('training_center.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
