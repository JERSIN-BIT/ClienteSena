<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get(config('services.senadmin.api_url') . '/courses');
        $response->throw();
        $courses = collect($response->object());

        return view('home', compact('courses'));
    }
}
