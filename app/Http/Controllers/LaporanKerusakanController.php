<?php

namespace App\Http\Controllers;
use App\Models\LaporanKerusakan;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanKerusakanExport;
use Illuminate\Http\Request;

class LaporanKerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $laporanKerusakan = LaporanKerusakan::with('fasilitas')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('pelapor', 'like', "%{$search}%")
                        ->orWhere('judul_laporan', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'laporan-kerusakan.index',
            compact(
                'laporanKerusakan',
                'search'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fasilitas = Fasilitas::all();

        return view(
            'laporan-kerusakan.create',
            compact('fasilitas')
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'fasilitas_id' => 'required',
            'pelapor' => 'required|max:255',
            'judul_laporan' => 'required|max:255',
            'deskripsi_kerusakan' => 'required',
            'status' => 'required',
            'tanggal_lapor' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request
                ->file('foto')
                ->store(
                    'laporan-kerusakan',
                    'public'
                );
        }

        LaporanKerusakan::create($validated);

        return redirect()
            ->route('laporan-kerusakan.index')
            ->with('success', 'Laporan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporanKerusakan = LaporanKerusakan::with('fasilitas')
            ->findOrFail($id);

        return view(
            'laporan-kerusakan.show',
            compact('laporanKerusakan')
        );
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporanKerusakan = LaporanKerusakan::findOrFail($id);

        $fasilitas = Fasilitas::all();

        return view(
            'laporan-kerusakan.edit',
            compact(
                'laporanKerusakan',
                'fasilitas'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        string $id
    ) {
        $laporanKerusakan = LaporanKerusakan::findOrFail($id);

        $validated = $request->validate([
            'fasilitas_id' => 'required',
            'pelapor' => 'required|max:255',
            'judul_laporan' => 'required|max:255',
            'deskripsi_kerusakan' => 'required',
            'status' => 'required',
            'tanggal_lapor' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {

            if (
                $laporanKerusakan->foto &&
                Storage::disk('public')->exists(
                    $laporanKerusakan->foto
                )
            ) {
                Storage::disk('public')->delete(
                    $laporanKerusakan->foto
                );
            }

            $validated['foto'] = $request
                ->file('foto')
                ->store(
                    'laporan-kerusakan',
                    'public'
                );
        }

        $laporanKerusakan->update($validated);

        return redirect()
            ->route('laporan-kerusakan.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    public function exportPdf()
    {
        $laporanKerusakan = LaporanKerusakan::with('fasilitas')
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'laporan-kerusakan.pdf',
            compact('laporanKerusakan')
        );

        return $pdf->download(
            'laporan-kerusakan.pdf'
        );
    }
    public function exportExcel()
    {
        return Excel::download(
            new LaporanKerusakanExport(),
            'laporan-kerusakan.xlsx'
        );
    }

    public function updateStatus(
        Request $request,
        $id
    ) {
        $laporanKerusakan =
            LaporanKerusakan::findOrFail($id);

        $laporanKerusakan->update([
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporanKerusakan = LaporanKerusakan::findOrFail($id);

        if (
            $laporanKerusakan->foto &&
            Storage::disk('public')->exists(
                $laporanKerusakan->foto
            )
        ) {
            Storage::disk('public')->delete(
                $laporanKerusakan->foto
            );
        }

        $laporanKerusakan->delete();

        return redirect()
            ->route('laporan-kerusakan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}
