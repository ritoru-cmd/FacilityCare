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

        $statusLabels = [
            'Menunggu',
            'Diproses',
            'Selesai'
        ];

        $statusValues = [
            $menunggu,
            $diproses,
            $selesai
        ];

        $baik = Fasilitas::where(
            'kondisi',
            'Baik'
        )->count();

        $rusakRingan = Fasilitas::where(
            'kondisi',
            'Rusak Ringan'
        )->count();

        $rusakBerat = Fasilitas::where(
            'kondisi',
            'Rusak Berat'
        )->count();

        $kondisiLabels = [
            'Baik',
            'Rusak Ringan',
            'Rusak Berat'
        ];

        $kondisiValues = [
            $baik,
            $rusakRingan,
            $rusakBerat
        ];

        $kategoriLabels = KategoriFasilitas::pluck(
            'nama_kategori'
        );

        $kategoriValues = KategoriFasilitas::withCount(
            'fasilitas'
        )
            ->pluck(
                'fasilitas_count'
            );

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
                'laporanTerbaru',
                'statusLabels',
                'statusValues',

                'kondisiLabels',
                'kondisiValues',

                'kategoriLabels',
                'kategoriValues'
            )
        );
    }
}
