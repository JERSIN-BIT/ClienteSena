<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function admin()
    {
        try {
            // Aquí consumimos la API de SENADMIN (asegúrate de que SENADMIN esté corriendo en el puerto 8000)
            $responseCourses = Http::get('http://127.0.0.1:8000/api/courses');
            $responseApprentices = Http::get('http://127.0.0.1:8000/api/apprentices');

            $courses = $responseCourses->successful() ? $responseCourses->json() : [];
            $apprentices = $responseApprentices->successful() ? $responseApprentices->json() : [];
        } catch (\Exception $e) {
            // Si SENADMIN está apagado o no responde, mandamos datos vacíos para que no se caiga la vista
            $courses = [];
            $apprentices = [];
        }

        // Retorna la vista del dashboard pasando los datos que vinieron de la API
        return view('dashboard.admin', compact('courses', 'apprentices'));
    }
}
