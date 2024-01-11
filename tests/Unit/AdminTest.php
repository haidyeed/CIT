<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Admin;
use Illuminate\Support\Str;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use DatabaseTransactions;

    public function create_admin()
    {
        $data = [
            'name' => 'haidy',
            'email' => 'admin.test@mail.com',
            'email_verified_at' => null,
            'password' => 12345678,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ];

        Admin::insert($data);
        $admin = Admin::latest()->first();
        return $admin;
    }

    public function test_admin_can_view_login_form()
    {
        $response = $this->get('/admin/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.admin-login');
    }

    public function test_admin_cannot_view_login_form_when_authenticated()
    {
        $admin = $this->create_admin();

        $response = $this->actingAs($admin)->get('/admin/login');

        $response->assertRedirect('/');
    }

    public function test_admin_cannot_view_user_register_form_when_authenticated()
    {
        $admin = $this->create_admin();

        $response = $this->actingAs($admin)->get('/register');

        $response->assertRedirect('/');
    }

    public function test_admin_cannot_view_user_login_when_authenticated()
    {
        $admin = $this->create_admin();

        $response = $this->actingAs($admin)->get('/login');

        $response->assertRedirect('/');
    }

    public function test_admin_can_navigate_into_dashboard()
    {
        $admin = $this->create_admin();

        $response = $this->actingAs($admin)->get('/dashboard/dashboard');

        $response->assertSessionHasNoErrors();

    }

    public function test_admin_cannot_login_with_invalid_credentials()
    {
        $admin = $this->create_admin();

        $response = $this->from('/admin/login')->post('/admin/login', [
            'email' => 'test@mail.com',
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/admin/login');
        $response->assertSessionHasErrors();

    }

}
