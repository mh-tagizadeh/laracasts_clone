<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_user()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->postJson('/api/register', [
            'name' => 'ali',
            'email' => 'ali@example.com',
            'password' => "password",
            'password_confirmation' => "password",
        ]);

        $response->dump();

        $response->assertStatus(200);
    }
}
