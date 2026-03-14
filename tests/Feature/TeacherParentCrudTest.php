<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use App\Models\ParentModel;
use App\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeacherParentCrudTest extends TestCase
{
    use RefreshDatabase;

    private User $teacher;
    private Student $student;

    protected function setUp(): void
    {
        parent::setUp();
        $this->teacher = User::factory()->create(['role' => UserRole::Teacher]);
        // Student created by this teacher
        $this->student = Student::factory()->create(['teacher_id' => $this->teacher->id]);
    }

    public function test_teacher_can_view_parents_of_own_students(): void
    {
        $parent = ParentModel::factory()->create(['student_id' => $this->student->id]);
        
        $otherTeacher = User::factory()->create(['role' => UserRole::Teacher]);
        $otherStudent = Student::factory()->create(['teacher_id' => $otherTeacher->id]);
        $otherParent = ParentModel::factory()->create(['student_id' => $otherStudent->id]);

        $response = $this->actingAs($this->teacher)->get(route('teacher.parents.index'));

        $response->assertStatus(200);
        $response->assertSee($parent->name);
        $response->assertDontSee($otherParent->name);
    }

    public function test_teacher_can_create_parent_for_own_student(): void
    {
        $parentData = [
            'student_id' => $this->student->id,
            'name' => 'Dad Doe',
            'email' => 'dad@example.com',
            'phone' => '1234567890',
        ];

        $response = $this->actingAs($this->teacher)->post(route('teacher.parents.store'), $parentData);

        $response->assertRedirect(route('teacher.parents.index'));
        $this->assertDatabaseHas('parent_models', [
            'name' => 'Dad Doe',
            'student_id' => $this->student->id,
        ]);
    }

    public function test_teacher_cannot_create_parent_for_others_student(): void
    {
        $otherTeacher = User::factory()->create(['role' => UserRole::Teacher]);
        $otherStudent = Student::factory()->create(['teacher_id' => $otherTeacher->id]);
        
        $parentData = [
            'student_id' => $otherStudent->id,
            'name' => 'Bad Dad',
            'email' => 'bad@example.com',
        ];

        $response = $this->actingAs($this->teacher)->post(route('teacher.parents.store'), $parentData);

        $response->assertSessionHasErrors('student_id');
    }

    public function test_teacher_can_delete_parent(): void
    {
        $parent = ParentModel::factory()->create(['student_id' => $this->student->id]);

        $response = $this->actingAs($this->teacher)->delete(route('teacher.parents.destroy', $parent));

        $response->assertRedirect(route('teacher.parents.index'));
        $this->assertSoftDeleted('parent_models', ['id' => $parent->id]);
    }
}
