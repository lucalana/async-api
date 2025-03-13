<?php

namespace App\Jobs;

use App\Models\Export;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class RemoveExportFileJob implements ShouldQueue
{
    use Queueable;
    public function __construct(
        protected Export $export
    ) {
    }

    public function handle(): void
    {
        Storage::delete($this->export->filename);
        $this->export->delete();
    }
}
