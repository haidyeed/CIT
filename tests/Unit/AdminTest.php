<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Admin;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use DatabaseTransactions;
    public function test_admin_can_view_login_form()
    {
        $response = $this->get('/admin/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.admin-login');
    }

    public function test_admin_cannot_view_login_form_when_authenticated()
    {
        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin, 'admin')
            ->get('/admin/login');

        $response->assertRedirect('/');
    }

    public function test_admin_cannot_view_user_register_form_when_authenticated()
    {
        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin, 'admin')
            ->get('/register');

        $response->assertRedirect('/');
    }

    public function test_admin_cannot_view_user_login_when_authenticated()
    {
        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin, 'admin')
            ->get('/login');

        $response->assertRedirect('/');
    }

    public function test_admin_can_navigate_into_dashboard()
    {
        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin, 'admin')
            ->get('/dashboard/dashboard');

        $response->assertSuccessful();
        $response->assertSessionHasNoErrors();
        $response->assertViewIs('dashboard.index');

    }

    public function test_admin_can_login_with_valid_credentials()
    {
        $admin = Admin::factory()->create([
            'name' => 'valid-name',
            'password' => 'valid-password',
        ]);

        $response = $this->post('/admin/login', [
            'name' => 'valid-name',
            'password' => 'valid-password',
        ]);

        $response->assertRedirect('/dashboard/dashboard');
        $response->assertSessionHasNoErrors();
    }

    public function test_admin_cannot_login_with_invalid_credentials()
    {
        $admin = Admin::factory()->create([
            'name' => 'valid-name',
            'password' => 'valid-password',
        ]);

        $response = $this->post('/admin/login', [
            'name' => 'invalid-name',
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/admin/login');
        $response->assertSessionHasErrors();

    }

}
