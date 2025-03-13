<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExportResource;
use App\Jobs\RemoveExportFileJob;
use App\Models\Export;
use App\Traits\ApiResponses;

class ExportController extends Controller
{
    use ApiResponses;

    public function index()
    {
        $exports = Export::paginate();
        return $this->success(ExportResource::collection($exports));
    }

    public function destroy(Export $export)
    {
        RemoveExportFileJob::dispatch($export);
        return $this->success(statusCode: 204);
    }
}
