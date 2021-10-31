<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_jet_count_lessons()
    {
        $response = $this->get('/api/home/get-count-lessons');

        $response->dump();

        $response->assertStatus(200);
    }

    public function test_get_parent_categories()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/api/home/parent-categories');

        $response->dump();

        $response->assertStatus(200);
    }
}
