<?php

namespace App\Traits;

use App\Enums\AnnouncementAudience;
use App\Models\ParentModel;
use App\Models\Student;
use Illuminate\Support\Collection;

/**
 * Shared logic for resolving announcement recipients and sending notifications.
 */
trait Announceable
{
    /**
     * Resolves the list of email addresses that should receive the announcement.
     *
     * @return Collection<int, string>
     */
    public function getTargetEmails(): Collection
    {
        $emails = collect();

        switch ($this->target_audience) {
            case AnnouncementAudience::Teachers:
                // Admin targeting teachers - logic for resolving all teacher emails
                $emails = \App\Models\User::role(\App\Enums\UserRole::Teacher)->pluck('email');
                break;

            case AnnouncementAudience::Students:
                // Teacher targeting their own students
                $emails = Student::where('teacher_id', $this->user_id)->pluck('email');
                break;

            case AnnouncementAudience::Parents:
                // Teacher targeting parents of their students
                $emails = ParentModel::whereHas('student', function ($query) {
                    $query->where('teacher_id', $this->user_id);
                })->pluck('email');
                break;

            case AnnouncementAudience::StudentsAndParents:
                // Combined students and parents
                $studentEmails = Student::where('teacher_id', $this->user_id)->pluck('email');
                $parentEmails = ParentModel::whereHas('student', function ($query) {
                    $query->where('teacher_id', $this->user_id);
                })->pluck('email');
                $emails = $studentEmails->merge($parentEmails);
                break;
        }

        return $emails->filter()->unique();
    }

    /**
     * Dispatch the queued job to send announcement emails.
     */
    public function sendNotifications(): void
    {
        if ($this->target_audience === AnnouncementAudience::Teachers) {
            // Admin announcements to teachers do not send emails per requirements
            return;
        }

        \App\Jobs\SendAnnouncementEmailJob::dispatch($this);
    }
}
