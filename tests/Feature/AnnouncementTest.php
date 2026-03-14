<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use App\Models\ParentModel;
use App\Enums\UserRole;
use App\Enums\AnnouncementAudience;
use App\Mail\AnnouncementMail;
use App\Jobs\SendAnnouncementEmailJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class AnnouncementTest extends TestCase
{
    use RefreshDatabase;

    private User $teacher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->teacher = User::factory()->create(['role' => UserRole::Teacher]);
    }

    public function test_teacher_can_create_announcement_and_dispatch_job(): void
    {
        Queue::fake();

        // Create a student and parent for this teacher to have recipients
        $student = Student::factory()->create(['teacher_id' => $this->teacher->id]);
        $parent = ParentModel::factory()->create(['student_id' => $student->id]);

        $announcementData = [
            'title' => 'Important Test Update',
            'body' => 'This is a test announcement body.',
            'target_audience' => AnnouncementAudience::StudentsAndParents->value,
        ];

        $response = $this->actingAs($this->teacher)->post(route('teacher.announcements.store'), $announcementData);

        $response->assertRedirect(route('teacher.announcements.index'));
        
        $this->assertDatabaseHas('announcements', [
            'title' => 'Important Test Update',
            'user_id' => $this->teacher->id,
        ]);

        // Verify job was pushed to queue via Announceable trait
        Queue::assertPushed(SendAnnouncementEmailJob::class);
    }

    public function test_admin_can_create_teacher_only_announcement(): void
    {
        Queue::fake();
        $admin = User::factory()->create(['role' => UserRole::Admin]);

        $response = $this->actingAs($admin)->post(route('admin.announcements.store'), [
            'title' => 'Admin Notice',
            'body' => 'Notice for all teachers.',
        ]);

        $this->assertDatabaseHas('announcements', [
            'title' => 'Admin Notice',
            'target_audience' => AnnouncementAudience::Teachers->value,
        ]);

        // Job should NOT be pushed for Admin announcements as per controller logic (skipping dispatch for Teachers audience in this demo)
        Queue::assertNotPushed(SendAnnouncementEmailJob::class);
    }

    public function test_announcement_job_sends_email(): void
    {
        Mail::fake();

        // Create a teacher with the target email to ensure getTargetEmails() finds it
        User::factory()->create([
            'role' => UserRole::Teacher,
            'email' => 'target@example.com'
        ]);

        $announcement = \App\Models\Announcement::factory()->create([
            'user_id' => $this->teacher->id,
            'target_audience' => AnnouncementAudience::Teachers
        ]);

        $job = new SendAnnouncementEmailJob($announcement);
        $job->handle();

        Mail::assertSent(AnnouncementMail::class, function ($mail) {
            return $mail->hasTo('target@example.com');
        });
    }
}
