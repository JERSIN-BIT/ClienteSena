<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComputerController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get(config('services.senadmin.api_url') . $url);
        $response->throw();

        return $response->object();
    }

    public function index()
    {
        $computers = $this->fetchDataFromApi('/computers');

        return view('computer.index', compact('computers'));
    }

    public function create()
    {
        return view('computer.create');
    }

    public function store(Request $request)
    {
        $response = Http::post(config('services.senadmin.api_url') . '/computers', $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('computer.index');
    }

    public function show($id)
    {
        $computer = $this->fetchDataFromApi('/computers/' . $id);

        return view('computer.show', compact('computer'));
    }

    public function edit($id)
    {
        $computer = $this->fetchDataFromApi('/computers/' . $id);

        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put(config('services.senadmin.api_url') . '/computers/' . $id, $request->except(['_token', '_method']));
        $response->throw();

        return redirect()->route('computer.index');
    }

    public function destroy($id)
    {
        $response = Http::delete(config('services.senadmin.api_url') . '/computers/' . $id);
        $response->throw();

        return redirect()->route('computer.index');
    }
}
