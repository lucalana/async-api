<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExportResource;
use App\Jobs\RemoveExportFileJob;
use App\Models\Export;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    use ApiResponses;

    public function index(Request $request)
    {
        $page = intval($request->get('page', 1));
        $exports = Export::paginate(20, ['file_url', 'created_at'], $page);
        return $this->success(ExportResource::collection($exports));
    }

    public function download(string $fileName)
    {
        $exportHistory = Auth::user()->exports()->where('file_url', $fileName)->first();
        if ($exportHistory) {
            return Storage::download($fileName);
        }
        return $this->error(['message' => 'This file do not exist'], 404);
    }

    public function destroy(string $fileName)
    {
        $exportHistory = Auth::user()->exports()->where('file_url', $fileName)->first();
        if ($exportHistory) {
            RemoveExportFileJob::dispatch($exportHistory);
            return $this->success(statusCode: 204);
        }
        return $this->error(['message' => 'This file do not exist'], 404);
    }
}
