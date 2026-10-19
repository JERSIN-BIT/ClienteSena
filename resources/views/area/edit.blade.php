@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>EDITAR ÁREA</h1>

        <form action="{{ route('area.update', $area->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text" name="name" class="form-control" value="{{ $area->name }}" required>

            </div>

            <button class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('area.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
