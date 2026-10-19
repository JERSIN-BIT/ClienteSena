@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>DETALLE DEL INSTRUCTOR</h1>

        <div class="card">

            <div class="card-body">

                <p><strong>ID:</strong> {{ $teacher->id }}</p>
                <p><strong>Nombre:</strong> {{ $teacher->name }}</p>
                <p><strong>Correo:</strong> {{ $teacher->email }}</p>
                <p><strong>Área:</strong> {{ $teacher->area_id }}</p>
                <p><strong>Centro:</strong> {{ $teacher->training_center_id }}</p>

                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning">
                    Editar
                </a>

                <a href="{{ route('teacher.index') }}" class="btn btn-secondary">
                    Volver
                </a>

            </div>

        </div>

    </div>
@endsection
