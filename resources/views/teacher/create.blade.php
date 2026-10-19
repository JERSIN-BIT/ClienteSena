@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>CREAR INSTRUCTOR</h1>

        <form action="{{ route('teacher.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nombre</label>

                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Correo</label>

                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Área</label>

                <select name="area_id" class="form-select" required>

                    <option value="">Seleccione un área</option>

                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">
                            {{ $area->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Centro de formación</label>

                <select name="training_center_id" class="form-select" required>

                    <option value="">Seleccione un centro</option>

                    @foreach ($training_centers as $center)
                        <option value="{{ $center->id }}">
                            {{ $center->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
