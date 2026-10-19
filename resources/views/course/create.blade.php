@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>CREAR CURSO</h1>

        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Número del curso</label>

                <input type="text" name="course_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jornada</label>

                <input type="text" name="day" class="form-control" required>
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

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Estado de la formación</label>
                    <select name="availability_status" class="form-select" required>
                        <option value="disponible">Disponible</option>
                        <option value="en curso">Ya comenzó</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Duración</label>
                    <input type="text" name="duration" class="form-control" placeholder="Ej. 15 meses" required>
                </div>
            </div>

            <div class="mb-3">
                <label>¿De qué trata?</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label>Materias o competencias</label>
                <textarea name="subjects" class="form-control" rows="4" placeholder="Escribe una materia por línea" required></textarea>
            </div>

            <div class="mb-3">
                <label>Imagen</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <button class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('course.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
