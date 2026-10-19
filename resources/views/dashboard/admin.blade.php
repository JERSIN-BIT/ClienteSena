@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="dashboard-intro">
            <div>
                <span class="eyebrow">Centro de control</span>
                <h1>Administración SENADMIN</h1>
                <p>Gestiona la operación del centro de formación.</p>
            </div>
        </div>

        <section class="admin-carousel-section" aria-labelledby="people-title">
            <div class="admin-section-heading">
                <div>
                    <span class="eyebrow">Gestión de personas</span>
                    <h2 id="people-title">Personas y formación</h2>
                </div>
            </div>

            <div id="peopleCarousel" class="carousel slide admin-carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <article class="admin-module-card">
                                    <span class="module-number">01</span>
                                    <h3>Aprendices</h3>
                                    <p>Registra y administra los aprendices del SENA.</p>
                                    <div class="admin-module-actions">
                                        <a href="{{ route('apprentice.create') }}" class="btn btn-success">Agregar</a>
                                        <a href="{{ route('apprentice.index') }}" class="btn btn-outline-success">Ver registros</a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article class="admin-module-card">
                                    <span class="module-number">02</span>
                                    <h3>Instructores</h3>
                                    <p>Administra la información de los instructores.</p>
                                    <div class="admin-module-actions">
                                        <a href="{{ route('teacher.create') }}" class="btn btn-success">Agregar</a>
                                        <a href="{{ route('teacher.index') }}" class="btn btn-outline-success">Ver registros</a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article class="admin-module-card">
                                    <span class="module-number">03</span>
                                    <h3>Formaciones</h3>
                                    <p>Gestiona los programas de formación disponibles.</p>
                                    <div class="admin-module-actions">
                                        <a href="{{ route('course.create') }}" class="btn btn-success">Agregar</a>
                                        <a href="{{ route('course.index') }}" class="btn btn-outline-success">Ver registros</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="admin-carousel-section" aria-labelledby="resources-title">
            <div class="admin-section-heading">
                <div>
                    <span class="eyebrow">Gestión de recursos</span>
                    <h2 id="resources-title">Recursos del centro</h2>
                </div>
            </div>

            <div id="resourcesCarousel" class="carousel slide admin-carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <article class="admin-module-card">
                                    <span class="module-number">04</span>
                                    <h3>Áreas</h3>
                                    <p>Organiza las áreas de conocimiento del centro.</p>
                                    <div class="admin-module-actions">
                                        <a href="{{ route('area.create') }}" class="btn btn-success">Agregar</a>
                                        <a href="{{ route('area.index') }}" class="btn btn-outline-success">Ver registros</a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article class="admin-module-card">
                                    <span class="module-number">05</span>
                                    <h3>Computadores</h3>
                                    <p>Controla el inventario de equipos disponibles.</p>
                                    <div class="admin-module-actions">
                                        <a href="{{ route('computer.create') }}" class="btn btn-success">Agregar</a>
                                        <a href="{{ route('computer.index') }}" class="btn btn-outline-success">Ver registros</a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article class="admin-module-card">
                                    <span class="module-number">06</span>
                                    <h3>Centros de formación</h3>
                                    <p>Administra los centros asociados al sistema.</p>
                                    <div class="admin-module-actions">
                                        <a href="{{ route('trainingcenter.create') }}" class="btn btn-success">Agregar</a>
                                        <a href="{{ route('trainingcenter.index') }}" class="btn btn-outline-success">Ver registros</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
