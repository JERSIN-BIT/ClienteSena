@extends('layouts.app')

@section('content')
    <div class="container apprentice-form">

        <div class="page-header">
            <div>
                <span class="page-label">ADMINISTRACIÓN</span>
                <h1>Nuevo aprendiz</h1>
                <p>Registra la información del nuevo aprendiz en el sistema.</p>
            </div>
        </div>

        <div class="form-card">

            <div class="form-card-header">
                <h2>Información del aprendiz</h2>
                <span>Completa todos los campos</span>
            </div>

            <form action="{{ route('apprentice.store') }}" method="POST">

                @csrf

                <div class="form-card-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Ingrese el nombre completo" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Ingrese el correo electrónico" required>
                    </div>

                    <div class="form-group">
                        <label for="cell_number">Número de celular</label>
                        <input type="text" name="cell_number" id="cell_number" class="form-control"
                            placeholder="Ingrese el número de celular" required>
                    </div>

                    <div class="form-group">
                        <label for="course_id">Curso</label>

                        <select name="course_id" id="course_id" class="form-select" required>

                            <option value="">Seleccione un curso</option>

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->course_number }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="computer_id">Computador</label>

                        <select name="computer_id" id="computer_id" class="form-select" required>

                            <option value="">Seleccione un computador</option>

                            @foreach ($computers as $computer)
                                <option value="{{ $computer->id }}">
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
                        Guardar aprendiz
                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
