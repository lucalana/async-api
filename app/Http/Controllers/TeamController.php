<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Jobs\SendExportEmailJob;
use App\Jobs\StoreExportDataJob;
use App\Jobs\StoreExportFileJob;
use App\Services\NbaService;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    use ApiResponses;

    public function __construct(
        public NbaService $nbaService
    ) {
    }

    public function index(TeamRequest $request)
    {
        $teams = $this->nbaService->getTeams(...$request->validated());
        return $this->success($teams);
    }

    public function export(TeamRequest $request)
    {
        $user = Auth::user();
        $filename = 'times-encontrados-' . now()->timestamp . str_replace('.', '', $user->email) . '.xlsx';
        StoreExportFileJob::dispatch($request->validated(), $filename)
            ->chain([
                new SendExportEmailJob($user, $filename),
                new StoreExportDataJob($user, $filename),
            ]);

        return $this->success([
            'message' => 'The request is being processed and you will receive a response by email when the file is read'
        ]);
    }
}
