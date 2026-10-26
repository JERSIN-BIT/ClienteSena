<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">ClienteSena</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="navbar-item"><a class="nav-link" href="{{ route('area.index') }}">Áreas</a></li>
                <li class="navbar-item"><a class="nav-link" href="{{ route('training_center.index') }}">Centros</a></li>
                <li class="navbar-item"><a class="nav-link" href="{{ route('computer.index') }}">Computadores</a></li>
                <li class="navbar-item"><a class="nav-link" href="{{ route('teacher.index') }}">Instructores</a></li>
                <li class="navbar-item"><a class="nav-link" href="{{ route('course.index') }}">Cursos</a></li>
                <li class="navbar-item"><a class="nav-link" href="{{ route('apprentice.index') }}">Aprendices</a></li>
            </ul>
        </div>
    </div>
</nav>