<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExportMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected string $filename
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Times da NBA',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.export',
            with: [
                'filename' => $this->filename
            ]
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorage($this->filename),
        ];
    }
}
