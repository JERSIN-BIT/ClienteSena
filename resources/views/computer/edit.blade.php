@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>EDITAR COMPUTADOR</h1>

        <form action="{{ route('computer.update', $computer->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Número</label>

                <input type="text" name="number" class="form-control" value="{{ $computer->number }}" required>

            </div>

            <div class="mb-3">

                <label>Marca</label>

                <input type="text" name="brand" class="form-control" value="{{ $computer->brand }}" required>

            </div>

            <button class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('computer.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
