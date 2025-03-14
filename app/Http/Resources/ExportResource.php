<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'fileaName' => $this->file_url,
            'createdAt' => $this->created_at,
            'downloadUrl' => route('export-download', $this->file_url)
        ];
    }
}
