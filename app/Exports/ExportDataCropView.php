<?php

namespace App\Exports;

use App\Models\CropRecord;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDataCropView implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CropRecord::all();
    }
}
