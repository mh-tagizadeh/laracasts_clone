<?php

namespace Tests\Feature\Http\Controllers\Api\Teacher;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Teacher;
use App\Models\User;

class TeachersControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_be_return_profile_teacher()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $teacher = Teacher::factory()->state(['username' => $user->name])->for($user)->create();

        $user->assignRole('teacher');

        // authentication teacher  
        $this->actingAs($user);

        $response = $this->json('GET', '/api/teachers/profile');

        $response->assertStatus(200);

        // return data teacher 
        $response->dump();
    }
}
