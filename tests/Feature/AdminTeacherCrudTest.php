<?php

namespace Tests\Feature;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTeacherCrudTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['role' => UserRole::Admin]);
    }

    public function test_admin_can_view_teachers_list(): void
    {
        $teacher = User::factory()->create(['role' => UserRole::Teacher]);

        $response = $this->actingAs($this->admin)->get(route('admin.teachers.index'));

        $response->assertStatus(200);
        $response->assertSee($teacher->name);
    }

    public function test_admin_can_create_teacher(): void
    {
        $teacherData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->actingAs($this->admin)->post(route('admin.teachers.store'), $teacherData);

        $response->assertRedirect(route('admin.teachers.index'));
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'role' => UserRole::Teacher->value,
        ]);
    }

    public function test_admin_can_update_teacher(): void
    {
        $teacher = User::factory()->create(['role' => UserRole::Teacher]);
        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ];

        $response = $this->actingAs($this->admin)->put(route('admin.teachers.update', $teacher), $updateData);

        $response->assertRedirect(route('admin.teachers.index'));
        $this->assertDatabaseHas('users', [
            'id' => $teacher->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    public function test_admin_can_delete_teacher(): void
    {
        $teacher = User::factory()->create(['role' => UserRole::Teacher]);

        $response = $this->actingAs($this->admin)->delete(route('admin.teachers.destroy', $teacher));

        $response->assertRedirect(route('admin.teachers.index'));
        $this->assertDatabaseMissing('users', ['id' => $teacher->id]);
    }
}
