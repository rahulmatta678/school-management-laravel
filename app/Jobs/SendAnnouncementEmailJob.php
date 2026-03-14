<?php

namespace App\Jobs;

use App\Mail\AnnouncementMail;
use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

/**
 * Handles the background dispatching of announcement emails.
 *
 * It resolves the list of unique recipient emails and sends
 * individual mailables for each.
 */
class SendAnnouncementEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     */
    public $tries = 3;

    /**
     * The number of seconds to wait before retrying the job.
     */
    public $backoff = 60;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Announcement $announcement
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Resolve target emails using the Announceable trait
        $emails = $this->announcement->getTargetEmails();
        $senderName = $this->announcement->user->name;

        foreach ($emails as $email) {
            Mail::to($email)->sendNow(new AnnouncementMail($this->announcement, $senderName));
        }
    }
}
