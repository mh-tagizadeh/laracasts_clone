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

    public function test_can_be_update_teacher_with_api()
    {
        $this->withoutExceptionHandling();

        // create user and assign role teacher for him 
        $user = User::factory()->create();

        $teacher = Teacher::factory()->state(['username' => $user->name])->for($user)->create();

        $user->assignRole('teacher');

        // authentication teacher  
        $this->actingAs($user);


        $response = $this->json('POST', '/api/teachers/update', [
            'first_name' => 'محمد',
            'last_name' => 'اصلی',
            'username' => $user->name,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, consequatur asperiores illum dolorum adipisci saepe optio numquam nam incidunt quibusdam, eaque, quas quo id consequuntur aliquid. Consequuntur consequatur temporibus tempora?',
            'address' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nobis commodi ullam sapiente expedita quas aliquam! Praesentium corporis libero ullam nostrum nihil cupiditate, nesciunt, laboriosam laudantium aut earum excepturi sed!',
            'phone_number' => $teacher->phone_number,
        ]);

        $response->assertStatus(200);

        //return data teacher
        $response->dump();
    }
    
    public function test_can_be_delete_teacher()
   {
        $this->withoutExceptionHandling();

        // create user and assign role teacher for him 
        $user = User::factory()->create();

        $teacher = Teacher::factory()->state(['username' => $user->name])->for($user)->create();

        $user->assignRole('teacher');

        // authentication teacher  
        $this->actingAs($user);


        $response = $this->json('DELETE', '/api/teachers/delete');

        $teacher_deleted = Teacher::where('id', $teacher->id)->first();

        $response->assertStatus(200);

        $this->assertEquals($teacher_deleted, null);

        $response->dump();
    }
}
