<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiViewFallbackTest extends TestCase
{
    public function test_apprentice_create_renders_when_api_returns_null(): void
    {
        Http::fake([
            '*' => Http::response('null', 200, ['Content-Type' => 'application/json']),
        ]);

        $this->get(route('apprentice.create'))
            ->assertOk()
            ->assertSee('Seleccione un curso')
            ->assertSee('Seleccione un computador');

        Http::assertSentCount(2);
    }

    public function test_course_and_teacher_create_render_when_api_requests_fail(): void
    {
        Http::fake([
            '*' => Http::response([], 503),
        ]);

        $this->get(route('course.create'))->assertOk();
        $this->get(route('teacher.create'))->assertOk();

        Http::assertSentCount(4);
    }
}
