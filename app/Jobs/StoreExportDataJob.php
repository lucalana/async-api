<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class StoreExportDataJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected Authenticatable|User $user,
        protected string $filename
    ) {
    }

    public function handle(): void
    {
        $this->user->exports()->create(['file_url' => $this->filename]);
    }
}
