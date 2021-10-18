<?php

namespace Tests\Feature\Http\Controllers\Api\Teacher;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class RequestsControllerTest extends TestCase
{
    use WithFaker;

    public function test_send_request_teacher_for_apply_teacher_with_api()
    {
        $this->withoutExceptionHandling();
        
        //create user with factory
        $user = User::factory()->create();

        // authenticate user 
        $this->actingAs($user);

        // create fake file for upload file
        Storage::fake('documents');

        $file = UploadedFile::fake()->create('documents.zip', 1000);

        // send http request for create request 
        $response = $this->json('POST', '/api/teachers/request-for-apply-teacher', [
            'first_name' => $this->faker->firstNameMale(),
            'last_name' => $this->faker->firstNameMale(),
            'username' => $this->faker->username(),
            'description' => $this->faker->text(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'documents' => $file,
        ]);

        $response->assertStatus(200);
        
        $response->dump();
    }

}
