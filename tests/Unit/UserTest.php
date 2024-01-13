<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

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
        $registerResponse->assertRedirect('/');

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

    public function test_user_cannot_view_admin_dashboard_when_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->get('/dashboard/dashboard');

        $response->assertRedirect('/admin/login');
    }

    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'name' => 'valid-name',
            'password' => 'valid-password',
        ]);

        $response = $this->post('/login', [
            'name' => 'valid-name',
            'password' => 'valid-password',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasNoErrors();

    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'name' => 'valid-name',
            'password' => 'valid-password',
        ]);

        $response = $this->post('/login', [
            'name' => 'invalid-name',
            'password' => 'invalid-password',
        ]);

        $response->assertSessionHasErrors();
        $response->assertRedirect('/login');
    }


}
