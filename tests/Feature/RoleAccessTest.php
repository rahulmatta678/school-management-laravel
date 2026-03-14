<?php

namespace Tests\Feature;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin can access admin dashboard.
     */
    public function test_admin_can_access_admin_dashboard(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Admin Dashboard');
    }

    /**
     * Test teacher cannot access admin dashboard.
     */
    public function test_teacher_cannot_access_admin_dashboard(): void
    {
        $teacher = User::factory()->create(['role' => UserRole::Teacher]);

        $response = $this->actingAs($teacher)->get('/admin/dashboard');

        $response->assertStatus(403);
    }

    /**
     * Test teacher can access teacher dashboard.
     */
    public function test_teacher_can_access_teacher_dashboard(): void
    {
        $teacher = User::factory()->create(['role' => UserRole::Teacher]);

        $response = $this->actingAs($teacher)->get('/teacher/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Teacher Dashboard');
    }

    /**
     * Test admin cannot access teacher dashboard.
     */
    public function test_admin_cannot_access_teacher_dashboard(): void
    {
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $response = $this->actingAs($admin)->get('/teacher/dashboard');

        $response->assertStatus(403);
    }

    /**
     * Test guest is redirected to login.
     */
    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');

        $response = $this->get('/teacher/dashboard');
        $response->assertRedirect('/login');
    }
}
