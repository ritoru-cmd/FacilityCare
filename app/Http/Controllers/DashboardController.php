<?php

namespace App\Http\Controllers;
use App\Models\Fasilitas;
use App\Models\LaporanKerusakan;
use App\Models\KategoriFasilitas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = KategoriFasilitas::count();

        $totalFasilitas = Fasilitas::count();

        $totalLaporan = LaporanKerusakan::count();

        $menunggu = LaporanKerusakan::where(
            'status',
            'Menunggu'
        )->count();

        $diproses = LaporanKerusakan::where(
            'status',
            'Diproses'
        )->count();

        $selesai = LaporanKerusakan::where(
            'status',
            'Selesai'
        )->count();

        $laporanTerbaru = LaporanKerusakan::with('fasilitas')
            ->latest()
            ->take(5)
            ->get();

        return view(
            'dashboard',
            compact(
                'totalKategori',
                'totalFasilitas',
                'totalLaporan',
                'menunggu',
                'diproses',
                'selesai',
                'laporanTerbaru'
            )
        );
    }
}
