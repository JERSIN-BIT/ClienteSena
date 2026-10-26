@extends('layouts.app')

@section('content')
    <div class="container">

        <span class="eyebrow">Oferta formativa</span>
        <h1>Detalle de la formación</h1>

        <div class="course-detail-card">

            <div class="card-body">

                <div class="course-detail-heading">
                    <div>
                        <span
                            class="course-status {{ ($course['availability_status'] ?? '') === 'disponible' ? 'is-available' : 'is-started' }}">
                            {{ ($course['availability_status'] ?? '') === 'disponible' ? 'Disponible' : 'Ya comenzó' }}
                        </span>
                        <h2>{{ $course['course_number'] ?? '' }}</h2>
                    </div>
                    <span class="course-duration">{{ $course['duration'] ?? '' }}</span>
                </div>

                <p><strong>Jornada:</strong> {{ $course['day'] ?? '' }}</p>
                <p><strong>Área:</strong> {{ $course['area']['name'] ?? 'Sin área' }}</p>
                <p><strong>Centro:</strong> {{ $course['training_center']['name'] ?? ($course['trainingCenter']['name'] ?? 'Sin centro') }}</p>

                @if (!empty($course['image']))
                    <img src="{{ asset('storage/' . $course['image']) }}" alt="Imagen de {{ $course['course_number'] ?? '' }}"
                        class="img-fluid mb-3" style="max-width: 500px;">
                @else
                    <p>Sin imagen</p>
                @endif

                <hr>

                <h3>¿De qué trata?</h3>
                <p class="course-description">{{ $course['description'] ?? 'Información detallada próximamente.' }}</p>

                <h3>Materias y competencias</h3>
                <ul class="course-subjects">
                    @foreach (preg_split('/\r\n|\r|\n/', $course['subjects'] ?? 'Información próximamente.') as $subject)
                        @if (trim($subject))
                            <li>{{ trim($subject) }}</li>
                        @endif
                    @endforeach
                </ul>

                @auth
                    <a href="{{ route('course.edit', $course['id'] ?? '') }}" class="btn btn-warning">Editar</a>
                @endauth

                <a href="{{ route('course.index') }}" class="btn btn-secondary">
                    Volver
                </a>

            </div>

        </div>

    </div>
@endsection
