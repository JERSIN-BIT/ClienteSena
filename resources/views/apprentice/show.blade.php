@extends('layouts.app')

@section('content')
    <div class="container apprentice-form">

        <div class="page-header">
            <div>
                <span class="page-label">ADMINISTRACIÓN</span>
                <h1>Detalle del aprendiz</h1>
                <p>Consulta la información registrada del aprendiz.</p>
            </div>
        </div>

        <div class="form-card">

            <div class="form-card-header">
                <h2>Información del aprendiz</h2>
                <span>Datos registrados en SENADMIN</span>
            </div>

            <div class="details-body">

                <div class="detail-item">
                    <span>ID</span>
                    <strong>{{ $apprentice->id }}</strong>
                </div>

                <div class="detail-item">
                    <span>Nombre</span>
                    <strong>{{ $apprentice->name }}</strong>
                </div>

                <div class="detail-item">
                    <span>Correo</span>
                    <strong>{{ $apprentice->email }}</strong>
                </div>

                <div class="detail-item">
                    <span>Número de celular</span>
                    <strong>{{ $apprentice->cell_number }}</strong>
                </div>

                <div class="detail-item">
                    <span>Curso</span>
                    <strong>{{ $apprentice->course_id }}</strong>
                </div>

                <div class="detail-item">
                    <span>Computador</span>
                    <strong>{{ $apprentice->computer_id }}</strong>
                </div>

            </div>

            <div class="form-card-footer">

                <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                <a href="{{ route('apprentice.edit', $apprentice->id) }}" class="btn btn-warning">
                    Editar aprendiz
                </a>

            </div>

        </div>

    </div>
@endsection
