<?php

namespace App\Mail;

use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Mailable for sending school announcements to students and parents.
 *
 * Implements ShouldQueue to ensure emails are sent in the background
 * via the configured queue driver (database).
 */
class AnnouncementMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param Announcement $announcement  The announcement model
     * @param string       $senderName    The name of the teacher/admin who sent it
     */
    public function __construct(
        public Announcement $announcement,
        public string $senderName
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New School Announcement: ' . $this->announcement->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.announcement',
            with: [
                'title'  => $this->announcement->title,
                'body'   => $this->announcement->body,
                'sender' => $this->senderName,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
