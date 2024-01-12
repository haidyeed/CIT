<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\{Admin, User};
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    public function test_no_one_can_create_task_except_admins()
    {
        $response = $this->post('/dashboard/tasks', [
            'title' => 'my task title',
            'description' => 'hello there, here is my task description',
            'admin_id' => Admin::take(30)->inRandomOrder()->first()->id,
            'user_id' => User::take(30)->inRandomOrder()->first()->id,
        ]);

        $response->assertRedirect('/admin/login');

    }

}
