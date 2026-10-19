@extends('layouts.app')

@section('content')
    <div class="container apprentice-form">

        <div class="page-header">
            <div>
                <span class="page-label">ADMINISTRACIÓN</span>
                <h1>Editar aprendiz</h1>
                <p>Actualiza la información del aprendiz registrado.</p>
            </div>
        </div>

        <div class="form-card">

            <div class="form-card-header">
                <h2>Información del aprendiz</h2>
                <span>Modifica los datos que necesites actualizar</span>
            </div>

            <form action="{{ route('apprentice.update', $apprentice->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-card-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>

                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $apprentice->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo</label>

                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ $apprentice->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="cell_number">Número de celular</label>

                        <input type="text" name="cell_number" id="cell_number" class="form-control"
                            value="{{ $apprentice->cell_number }}" required>
                    </div>

                    <div class="form-group">
                        <label for="course_id">Curso</label>

                        <select name="course_id" id="course_id" class="form-select" required>

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ $apprentice->course_id == $course->id ? 'selected' : '' }}>
                                    {{ $course->course_number }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="computer_id">Computador</label>

                        <select name="computer_id" id="computer_id" class="form-select" required>

                            @foreach ($computers as $computer)
                                <option value="{{ $computer->id }}"
                                    {{ $apprentice->computer_id == $computer->id ? 'selected' : '' }}>
                                    {{ $computer->number }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                </div>

                <div class="form-card-footer">

                    <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        Actualizar aprendiz
                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
