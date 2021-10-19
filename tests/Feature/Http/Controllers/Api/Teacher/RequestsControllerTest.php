<?php

namespace Tests\Feature\Http\Controllers\Api\Teacher;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Teacher;

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

    public function test_can_be_send_request_for_create_course_with_api()
    {
        $this->withoutExceptionHandling();
        
        //create user with factory
        $user = User::factory()->create();

        $teacher = Teacher::factory()->state(['username' => $user->name])->for($user)->create();

        $user->assignRole('teacher');

        // authenticate user 
        $this->actingAs($user);

        // create fake file for upload file
        Storage::fake('documents');

        $file = UploadedFile::fake()->create('documents.zip', 1000);

        
        // send http request for create request 
        $response = $this->json('POST', '/api/teachers/request-for-create-course', [
            'title' => $this->faker->city(),
            'offer_price' => $this->faker->numberBetween($min = 100, $max = 9000),
            'description' => $this->faker->text(),
            'description_for_admin' => $this->faker->text(),
            'category_id' => $this->faker->numberBetween($min=1,$max=20),
            'state' => 0, 
            'published_at' => now(),
        ]);

        $response->assertStatus(200);
        
        $response->dump();
    }
}
