<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training_centers');

        return view('teacher.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/teachers', $request->all());

        return redirect()->route('teacher.index')->with('success', 'Profesor creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);
        $areas = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training_centers');

        return view('teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/teachers/' . $id, $request->all());

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teachers/' . $id);

        return redirect()->route('teacher.index');
    }
}
