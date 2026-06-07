<?php

namespace App\Http\Controllers;
use App\Models\KategoriFasilitas;
use Illuminate\Http\Request;

class KategoriFasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $search = $request->search;

        $kategoriFasilitas = KategoriFasilitas::when($search, function ($query) use ($search) {
            $query->where('nama_kategori', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view('kategori-fasilitas.index', compact(
            'kategoriFasilitas',
            'search'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        return view('kategori-fasilitas.create');
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
            'nama_kategori' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        KategoriFasilitas::create($validated);

        return redirect()
            ->route('kategori-fasilitas.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $kategoriFasilitas = KategoriFasilitas::findOrFail($id);
        return view(
            'kategori-fasilitas.show',
            compact('kategoriFasilitas')
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

        $kategoriFasilitas = KategoriFasilitas::findOrFail($id);

        return view(
            'kategori-fasilitas.edit',
            compact('kategoriFasilitas')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        string $id,
        Request $request
    ) {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $kategoriFasilitas = KategoriFasilitas::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        $kategoriFasilitas->update($validated);

        return redirect()
            ->route('kategori-fasilitas.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $kategoriFasilitas = KategoriFasilitas::findOrFail($id);

        $kategoriFasilitas->delete();

        return redirect()
            ->route('kategori-fasilitas.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
