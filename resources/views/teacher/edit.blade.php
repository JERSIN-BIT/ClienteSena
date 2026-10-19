@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>EDITAR INSTRUCTOR</h1>

        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" required>

            </div>

            <div class="mb-3">

                <label>Correo</label>

                <input type="email" name="email" class="form-control" value="{{ $teacher->email }}" required>

            </div>

            <div class="mb-3">

                <label>Área</label>

                <select name="area_id" class="form-select">

                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ $teacher->area_id == $area->id ? 'selected' : '' }}>

                            {{ $area->name }}

                        </option>
                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Centro de formación</label>

                <select name="training_center_id" class="form-select">

                    @foreach ($training_centers as $center)
                        <option value="{{ $center->id }}"
                            {{ $teacher->training_center_id == $center->id ? 'selected' : '' }}>

                            {{ $center->name }}

                        </option>
                    @endforeach

                </select>

            </div>

            <button class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
