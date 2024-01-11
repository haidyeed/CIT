<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function create_user()
    {
        $data = [
            'name' => 'haidy',
            'email' => 'test@mail.com',
            'email_verified_at' => null,
            'password' => 12345678,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ];

        User::insert($data);
        $user = User::latest()->first();
        return $user;
    }


    public function test_user_can_view_register_form()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_user_can_register_with_valid_credentials()
    {

        $registerResponse = $this->post('/register', [
            'email' => 'test@mail.com',
            'name' => 'haidy',
            'password' => 12345678,
            'password_confirmation' => 12345678
        ]);

        $registerResponse->assertSessionHasNoErrors();
        $registerResponse->assertRedirect('/userhome');

    }

    public function test_user_cannot_register_with_invalid_credentials()
    {

        $registerResponse = $this->post('/register', [
            'email' => 'test@mail.com',
            'name' => 'haidy',
            'password' => 1234567890,
            'password_confirmation' => 12345678
        ]);

        $registerResponse->assertSessionHasErrors();

    }

    public function test_user_can_view_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.user-login');
    }

    public function test_user_cannot_view_login_form_when_authenticated()
    {
        $user = $this->create_user();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }

    public function test_user_cannot_view_admin_dashboard_when_authenticated()
    {
        $user = $this->create_user();

        $response = $this->actingAs($user)->get('/dashboard/dashboard');

        $response->assertRedirect('/admin/login');
    }

    public function test_user_can_login_with_valid_credentials()
    {
        $user = $this->create_user();

        $loginResponse = $this->post('/login', [
            'email' => 'test@mail.com',
            'password' => 12345678,
        ]);

        $loginResponse->assertRedirect('/');

    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = $this->create_user();

        $response = $this->from('/login')->post('/login', [
            'email' => 'test2@mail.com',
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors();

    }


}
