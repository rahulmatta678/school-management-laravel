<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use App\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeacherStudentCrudTest extends TestCase
{
    use RefreshDatabase;

    private User $teacher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->teacher = User::factory()->create(['role' => UserRole::Teacher]);
    }

    public function test_teacher_can_view_own_students(): void
    {
        $student = Student::factory()->create(['teacher_id' => $this->teacher->id]);
        $otherTeacher = User::factory()->create(['role' => UserRole::Teacher]);
        $otherStudent = Student::factory()->create(['teacher_id' => $otherTeacher->id]);

        $response = $this->actingAs($this->teacher)->get(route('teacher.students.index'));

        $response->assertStatus(200);
        $response->assertSee($student->name);
        $response->assertDontSee($otherStudent->name);
    }

    public function test_teacher_can_create_student(): void
    {
        $studentData = [
            'name' => 'Kid Name',
            'email' => 'kid@school.com',
            'age' => 10,
            'grade' => '5th',
        ];

        $response = $this->actingAs($this->teacher)->post(route('teacher.students.store'), $studentData);

        $response->assertRedirect(route('teacher.students.index'));
        $this->assertDatabaseHas('students', [
            'name' => 'Kid Name',
            'teacher_id' => $this->teacher->id,
        ]);
    }

    public function test_teacher_cannot_update_others_student(): void
    {
        $otherTeacher = User::factory()->create(['role' => UserRole::Teacher]);
        $otherStudent = Student::factory()->create(['teacher_id' => $otherTeacher->id]);
        
        $response = $this->actingAs($this->teacher)->put(route('teacher.students.update', $otherStudent), [
            'name' => 'Stolen Student',
        ]);

        $response->assertStatus(404); // Scoped by CreatedByScope, so it won't even find it
    }

    public function test_teacher_can_soft_delete_student(): void
    {
        $student = Student::factory()->create(['teacher_id' => $this->teacher->id]);

        $response = $this->actingAs($this->teacher)->delete(route('teacher.students.destroy', $student));

        $response->assertRedirect(route('teacher.students.index'));
        $this->assertSoftDeleted('students', ['id' => $student->id]);
    }
}
