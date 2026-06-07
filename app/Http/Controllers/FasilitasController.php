<?php

namespace App\Http\Controllers;
use App\Models\Fasilitas;
use App\Models\KategoriFasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $fasilitas = Fasilitas::with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_fasilitas', 'like', "%{$search}%")
                    ->orWhere('kode_fasilitas', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'fasilitas.index',
            compact('fasilitas', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $kategoriFasilitas = KategoriFasilitas::all();

        return view(
            'fasilitas.create',
            compact('kategoriFasilitas')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'kategori_fasilitas_id' => 'required',
            'kode_fasilitas' => 'required|unique:fasilitas',
            'nama_fasilitas' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Fasilitas::create($validated);

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fasilitas = Fasilitas::with('kategori')
            ->findOrFail($id);

        return view(
            'fasilitas.show',
            compact('fasilitas')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $fasilitas = Fasilitas::findOrFail($id);

        $kategoriFasilitas = KategoriFasilitas::all();

        return view(
            'fasilitas.edit',
            compact(
                'fasilitas',
                'kategoriFasilitas'
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
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $fasilitas = Fasilitas::findOrFail($id);

        $validated = $request->validate([
            'kategori_fasilitas_id' => 'required',
            'kode_fasilitas' => 'required|unique:fasilitas,kode_fasilitas,' . $id,
            'nama_fasilitas' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $fasilitas->update($validated);

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $fasilitas = Fasilitas::findOrFail($id);

        $fasilitas->delete();

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Fasilitas berhasil dihapus.');
    }
}
