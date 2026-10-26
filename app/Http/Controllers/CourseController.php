<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/courses');

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $course = Http::get($url . '/courses')->json();

        return view('course.create', compact('course'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/courses', $request->all());

        return redirect()->route('course.index')->with('success', 'Curso creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);

        return view('course.show', compact('course'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);

        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/courses/' . $id, $request->all());

        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/courses/' . $id);

        return redirect()->route('course.index');
    }
}
