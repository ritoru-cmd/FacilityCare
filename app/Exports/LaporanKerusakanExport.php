<?php

namespace App\Exports;

use App\Models\LaporanKerusakan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanKerusakanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LaporanKerusakan::with('fasilitas')
            ->get()
            ->map(function ($item) {

                return [
                    'pelapor' => $item->pelapor,
                    'fasilitas' => $item->fasilitas->nama_fasilitas ?? '-',
                    'judul' => $item->judul_laporan,
                    'status' => $item->status,
                    'tanggal' => $item->tanggal_lapor,
                ];

            });
    }

    public function headings(): array
    {
        return [
            'Pelapor',
            'Fasilitas',
            'Judul Laporan',
            'Status',
            'Tanggal Lapor',
        ];
    }
}