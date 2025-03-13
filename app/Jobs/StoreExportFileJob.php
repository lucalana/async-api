<?php

namespace App\Jobs;

use App\Exports\TeamExport;
use App\Services\NbaService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Maatwebsite\Excel\Facades\Excel;

class StoreExportFileJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected array $queryParams,
        protected string $filename,
        protected NbaService $nbaService = new NbaService()
    ) {
    }

    public function handle(): void
    {
        $teams = $this->nbaService->getTeams(...$this->queryParams);
        Excel::store(new TeamExport($teams), $this->filename, 's3');
    }
}
