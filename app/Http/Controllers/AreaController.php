<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');
        $areas = $this->fetchDataFromApi($url . '/areas');

        return view('area.index', compact('areas'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $area = $this->fetchDataFromApi($url . '/areas');

        return view('area.create', compact('area'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/areas', $request->all());

        return redirect()->route('area.index')->with('success', 'Area creada correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('area.show', compact('area'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('area.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/areas/' . $id, $request->all());

        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/areas/' . $id);

        return redirect()->route('area.index');
    }
}
