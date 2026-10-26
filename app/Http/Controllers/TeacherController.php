<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $teacher = Http::get($url . '/teachers')->json();

        return view('teacher.create', compact('teacher'));
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

        return view('teacher.edit', compact('teacher'));
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
