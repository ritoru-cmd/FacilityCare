@extends('layouts.app')

@section('title', 'Laporan Kerusakan')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">
            {{-- Header --}}

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">

                
                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Laporan Kerusakan
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Kelola laporan kerusakan fasilitas kampus dan pantau progres perbaikannya.
                    </p>

                </div>

                <div class="flex flex-wrap gap-2">

                    <a href="{{ route('laporan-kerusakan.create') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600
            hover:from-blue-700 hover:to-indigo-700
            text-white px-3 py-2 rounded-xl shadow-lg transition-all">

                        + Tambah Laporan

                    </a>

                    <a href="{{ route('laporan-kerusakan.pdf') }}" class="bg-red-100 text-red-700 px-3 py-2 rounded-xl">

                        Export PDF

                    </a>

                    <a href="{{ route('laporan-kerusakan.excel') }}"
                        class="bg-green-100 text-green-700 px-3 py-2 rounded-xl">

                        Export Excel

                    </a>

                </div>
                

            </div>

            {{-- Search --}}

            <form method="GET" class="mb-6">

                
                <div class="flex gap-3">

                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari laporan..." class="flex-1 border border-gray-300 rounded-xl px-4 py-3
            focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <button class="bg-blue-600 hover:bg-blue-700
            text-white px-5 rounded-xl transition-all">

                        Cari

                    </button>

                </div>
                

            </form>

            {{-- Table Card --}}

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

                
                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="bg-gray-50 text-gray-600 uppercase text-sm">

                                <th class="p-4 text-left">No</th>
                                <th class="p-4 text-left">Foto</th>
                                <th class="p-4 text-left">Fasilitas</th>
                                <th class="p-4 text-left">Pelapor</th>
                                <th class="p-4 text-left">Judul</th>
                                <th class="p-4 text-left">Status</th>
                                <th class="p-4 text-left">Tanggal</th>
                                <th class="p-4 text-left">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($laporanKerusakan as $item)

                                <tr class="border-t hover:bg-blue-50 transition">

                                    <td class="p-4">
                                        {{ $laporanKerusakan->firstItem() + $loop->index }}
                                    </td>

                                    <td class="p-4">

                                        @if($item->foto)

                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto"
                                                class="w-16 h-16 object-cover rounded-xl border">

                                        @else

                                            <div
                                                class="w-16 h-16 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400">

                                                📷

                                            </div>

                                        @endif

                                    </td>

                                    <td class="p-4">
                                        {{ $item->fasilitas->nama_fasilitas ?? '-' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->pelapor }}
                                    </td>

                                    <td class="p-4">
                                        {{ \Illuminate\Support\Str::limit($item->judul_laporan, 40) }}
                                    </td>

                                    <td class="p-4">

                                        <select class="status-select border border-gray-300 rounded-xl px-8 py-2"
                                            data-id="{{ $item->id }}">

                                            <option value="Menunggu" {{ $item->status == 'Menunggu' ? 'selected' : '' }}>
                                                Menunggu
                                            </option>

                                            <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>
                                                Diproses
                                            </option>

                                            <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>

                                        </select>

                                    </td>

                                    <td class="p-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_lapor)->format('d M Y') }}
                                    </td>

                                    <td class="p-4 space-x-2">

                                        <a href="{{ route('laporan-kerusakan.show', $item->id) }}"
                                            class="px-3 py-1 rounded-lg bg-green-100 text-green-700">

                                            Detail

                                        </a>

                                        <a href="{{ route('laporan-kerusakan.edit', $item->id) }}"
                                            class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700">

                                            Edit

                                        </a>

                                        <form action="{{ route('laporan-kerusakan.destroy', $item->id) }}" method="POST"
                                            class="inline">

                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Hapus data ini?')"
                                                class="px-3 py-1 rounded-lg bg-red-100 text-red-700">

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center py-12 text-gray-500">

                                        📋

                                        <div class="mt-2">
                                            Belum ada laporan kerusakan
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>
                

            </div>

            <div class="mt-6">

                
                {{ $laporanKerusakan->links() }}
                

            </div>


            <script>

                document
                    .querySelectorAll('.status-select')
                    .forEach(select => {

                        select.addEventListener(
                            'change',
                            function () {

                                fetch(
                                    `/laporan-kerusakan/${this.dataset.id}/status`,
                                    {
                                        method: 'PATCH',

                                        headers: {
                                            'Content-Type':
                                                'application/json',

                                            'X-CSRF-TOKEN':
                                                document
                                                    .querySelector(
                                                        'meta[name="csrf-token"]'
                                                    )
                                                    .content
                                        },

                                        body: JSON.stringify({
                                            status: this.value
                                        })
                                    }
                                )
                                    .then(response => response.json())
                                    .then(data => {

                                        alert(
                                            'Status berhasil diperbarui!'
                                        );

                                    });

                            }
                        );

                    });

            </script>

@endsection