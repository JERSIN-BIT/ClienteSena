<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/courses');

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training_centers');

        return view('course.create', compact('areas', 'training_centers'));
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
        $areas = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training_centers');

        return view('course.edit', compact('course', 'areas', 'training_centers'));
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
