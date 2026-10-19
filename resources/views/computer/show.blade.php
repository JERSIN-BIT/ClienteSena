@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>DETALLE DEL COMPUTADOR</h1>

        <div class="card">

            <div class="card-body">

                <p><strong>ID:</strong> {{ $computer->id }}</p>

                <p><strong>Número:</strong> {{ $computer->number }}</p>

                <p><strong>Marca:</strong> {{ $computer->brand }}</p>

                <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-warning">
                    Editar
                </a>

                <a href="{{ route('computer.index') }}" class="btn btn-secondary">
                    Volver
                </a>

            </div>

        </div>

    </div>
@endsection
