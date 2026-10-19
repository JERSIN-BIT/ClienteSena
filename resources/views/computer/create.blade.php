@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>CREAR COMPUTADOR</h1>

        <form action="{{ route('computer.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Número</label>

                <input type="text" name="number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Marca</label>

                <input type="text" name="brand" class="form-control" required>
            </div>

            <button class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('computer.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
