<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get(config('services.senadmin.api_url') . $url);
        $response->throw();

        return $response->object();
    }

    public function index()
    {
        $courses = $this->fetchDataFromApi('/courses');

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        $areas = $this->fetchDataFromApi('/areas');
        $training_centers = $this->fetchDataFromApi('/training-centers');

        return view('course.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $fields = $request->except(['_token', '_method', 'image']);
        $url = config('services.senadmin.api_url') . '/courses';

        if ($request->hasFile('image')) {
            $response = Http::attach(
                'image',
                file_get_contents($request->file('image')->getRealPath()),
                $request->file('image')->getClientOriginalName()
            )->post($url, $fields);
        } else {
            $response = Http::post($url, $fields);
        }

        $response->throw();

        return redirect()->route('course.index');
    }

    public function show($id)
    {
        $course = $this->fetchDataFromApi('/courses/' . $id);

        return view('course.show', compact('course'));
    }

    public function edit($id)
    {
        $course = $this->fetchDataFromApi('/courses/' . $id);
        $areas = $this->fetchDataFromApi('/areas');
        $training_centers = $this->fetchDataFromApi('/training-centers');

        return view('course.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $fields = $request->except(['_token', '_method', 'image']);
        $url = config('services.senadmin.api_url') . '/courses/' . $id;

        if ($request->hasFile('image')) {
            $fields['_method'] = 'PUT';
            $response = Http::attach(
                'image',
                file_get_contents($request->file('image')->getRealPath()),
                $request->file('image')->getClientOriginalName()
            )->post($url, $fields);
        } else {
            $response = Http::put($url, $fields);
        }

        $response->throw();

        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $response = Http::delete(config('services.senadmin.api_url') . '/courses/' . $id);
        $response->throw();

        return redirect()->route('course.index');
    }
}
