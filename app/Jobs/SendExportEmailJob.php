<?php

namespace App\Jobs;

use App\Mail\ExportMail;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendExportEmailJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected Authenticatable|User $user,
        protected string $filename
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->user->email)->send(new ExportMail($this->filename));
    }
}
