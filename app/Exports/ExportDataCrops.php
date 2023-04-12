<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\SensorDatalog;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportDataCrops implements FromView, ShouldAutoSize
{

    protected $datalogs;

    public function __construct($datalogs)
    {
        $this->datalogs = $datalogs;
    }

    public function view(): View
    {
        return view('module.crops.pivot_excel', [
            'datalogs' => $this->datalogs
        ]);
    }

}
