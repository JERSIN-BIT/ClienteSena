<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $training_centers = $this->fetchDataFromApi($url . '/training_centers');

        return view('training_center.index', compact('training_centers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $training_center = Http::get($url . '/training_centers')->json();

        return view('training_center.create', compact('training_center'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/training_centers', $request->all());

        return redirect()->route('trainingcenter.index')->with('success', 'Centro de formación creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $training_center = $this->fetchDataFromApi($url . '/training_centers/' . $id);

        return view('training_center.show', compact('training_center'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $training_center = $this->fetchDataFromApi($url . '/training_centers/' . $id);

        return view('training_center.edit', compact('training_center'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/training_centers/' . $id, $request->all());

        return redirect()->route('trainingcenter.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/training_centers/' . $id);

        return redirect()->route('trainingcenter.index');
    }
}
