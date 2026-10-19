<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApprenticeController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get(config('services.senadmin.api_url') . $url);
        $response->throw();

        return $response->object();
    }

    public function index()
    {
        $apprentices = $this->fetchDataFromApi('/apprentices');

        return view('apprentice.index', compact('apprentices'));
    }

    public function create()
    {
        $courses = $this->fetchDataFromApi('/courses');
        $computers = $this->fetchDataFromApi('/computers');

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $response = Http::post(config('services.senadmin.api_url') . '/apprentices', $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('apprentice.index');
    }

    public function show($id)
    {
        $apprentice = $this->fetchDataFromApi('/apprentices/' . $id);

        return view('apprentice.show', compact('apprentice'));
    }

    public function edit($id)
    {
        $apprentice = $this->fetchDataFromApi('/apprentices/' . $id);
        $courses = $this->fetchDataFromApi('/courses');
        $computers = $this->fetchDataFromApi('/computers');

        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put(config('services.senadmin.api_url') . '/apprentices/' . $id, $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('apprentice.index');
    }

    public function destroy($id)
    {
        $response = Http::delete(config('services.senadmin.api_url') . '/apprentices/' . $id);
        $response->throw();

        return redirect()->route('apprentice.index');
    }
}
