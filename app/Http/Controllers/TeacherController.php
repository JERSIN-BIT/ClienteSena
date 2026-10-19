<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get(config('services.senadmin.api_url') . $url);
        $response->throw();

        return $response->object();
    }

    public function index()
    {
        $teachers = $this->fetchDataFromApi('/teachers');

        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $areas = $this->fetchDataFromApi('/areas');
        $training_centers = $this->fetchDataFromApi('/training-centers');

        return view('teacher.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $response = Http::post(config('services.senadmin.api_url') . '/teachers', $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('teacher.index');
    }

    public function show($id)
    {
        $teacher = $this->fetchDataFromApi('/teachers/' . $id);

        return view('teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = $this->fetchDataFromApi('/teachers/' . $id);
        $areas = $this->fetchDataFromApi('/areas');
        $training_centers = $this->fetchDataFromApi('/training-centers');

        return view('teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put(config('services.senadmin.api_url') . '/teachers/' . $id, $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $response = Http::delete(config('services.senadmin.api_url') . '/teachers/' . $id);
        $response->throw();

        return redirect()->route('teacher.index');
    }
}
