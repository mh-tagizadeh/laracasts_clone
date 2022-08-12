<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Admin;

class AuthTest extends TestCase
{
    /**
     * test login method ===>validation requests
     *
     * @return void
     */
    public function test_login_with_validation_error()
    {
        $response = $this->postJson('management/auth/login', []);

        $response->assertStatus(422);
    }

    /**
     * test login method ===> login fail
     *
     * @return void
     */
    public function test_admin_login_fail()
    {
        $response = $this->postJson('management/auth/login', [
            'name' => 'aaaaaaaaa',
            'password' => 'aaaaaaaa'
        ]);

        $response->assertStatus(422);
        $this->assertEquals($response->original['message'], 'admin.login.wrong_name_or_password');
    }

    /**
     * test login method ===> login successful
     *
     * @return void
     */
    public function test_admin_login()
    {
        $admin = Admin::factory()->create();

        $response = $this->postJson('management/auth/login', [
            'name' => $admin->name,
            'password' => 'password'
        ]);

        $response->assertOk();

        $this->assertEquals($response->original['message'], 'admin.login.success');

        $this->assertEquals($response->original['admin']->name, $admin->name);

        $this->assertEquals($response->original['admin']->email, $admin->email);

    }
}
