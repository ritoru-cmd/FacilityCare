<?php

namespace App\Exports;

use App\Models\Fasilitas;
use Maatwebsite\Excel\Concerns\FromCollection;

class FasilitasExport implements FromCollection
{
    public function collection()
    {
        return Fasilitas::with('kategori')->get();
    }
}