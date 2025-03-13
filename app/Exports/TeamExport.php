<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeamExport implements FromCollection, WithHeadings
{
    public function __construct(
        private array $reportData
    ) {
    }

    public function headings(): array
    {
        return array_keys($this->reportData[0] ?? []);
    }

    public function collection()
    {
        return collect($this->reportData);
    }
}
