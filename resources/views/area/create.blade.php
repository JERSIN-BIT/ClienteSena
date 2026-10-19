@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>CREAR ÁREA</h1>

        <form action="{{ route('area.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nombre</label>

                <input type="text" name="name" class="form-control" required>
            </div>

            <button class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('area.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
