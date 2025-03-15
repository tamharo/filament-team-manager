<?php

namespace Manhamprod\FilamentTeamManager\Mail;

use Manhamprod\FilamentTeamManager\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Manhamprod\FilamentTeamManager\Models\TeamInvitation;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamInvitationRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public TeamInvitation $invitation
    )
    { }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: config("filament-team-manager.mail.invitation.subject"),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.team-invitation-request-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
