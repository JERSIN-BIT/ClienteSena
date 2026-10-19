@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>EDITAR CURSO</h1>

        <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Número del curso</label>

                <input type="text" name="course_number" class="form-control" value="{{ $course->course_number }}" required>
            </div>

            <div class="mb-3">
                <label>Jornada</label>

                <input type="text" name="day" class="form-control" value="{{ $course->day }}" required>
            </div>

            <div class="mb-3">
                <label>Área</label>

                <select name="area_id" class="form-select">

                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ $course->area_id == $area->id ? 'selected' : '' }}>

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
                            {{ $course->training_center_id == $center->id ? 'selected' : '' }}>

                            {{ $center->name }}

                        </option>
                    @endforeach

                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Estado de la formación</label>
                    <select name="availability_status" class="form-select" required>
                        <option value="disponible" {{ $course->availability_status === 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="en curso" {{ $course->availability_status === 'en curso' ? 'selected' : '' }}>Ya comenzó</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Duración</label>
                    <input type="text" name="duration" class="form-control" value="{{ $course->duration }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label>¿De qué trata?</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $course->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Materias o competencias</label>
                <textarea name="subjects" class="form-control" rows="4" required>{{ $course->subjects }}</textarea>
            </div>

            <div class="mb-3">
                <label>Imagen</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if ($course->image)
                    <img src="{{ config('services.senadmin.asset_url') . '/storage/' . $course->image }}" alt="Imagen de {{ $course->course_number }}" class="mt-2" style="max-width: 180px;">
                @endif
            </div>

            <button class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('course.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
@endsection
