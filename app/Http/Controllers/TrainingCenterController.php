<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get(config('services.senadmin.api_url') . $url);
        $response->throw();

        return $response->object();
    }

    public function index()
    {
        $trainingCenters = $this->fetchDataFromApi('/training-centers');

        return view('training_center.index', compact('trainingCenters'));
    }

    public function create()
    {
        return view('training_center.create');
    }

    public function store(Request $request)
    {
        $response = Http::post(config('services.senadmin.api_url') . '/training-centers', $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('trainingcenter.index');
    }

    public function show($id)
    {
        $trainingCenter = $this->fetchDataFromApi('/training-centers/' . $id);

        return view('training_center.show', compact('trainingCenter'));
    }

    public function edit($id)
    {
        $trainingCenter = $this->fetchDataFromApi('/training-centers/' . $id);

        return view('training_center.edit', compact('trainingCenter'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put(config('services.senadmin.api_url') . '/training-centers/' . $id, $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('trainingcenter.index');
    }

    public function destroy($id)
    {
        $response = Http::delete(config('services.senadmin.api_url') . '/training-centers/' . $id);
        $response->throw();

        return redirect()->route('trainingcenter.index');
    }
}
