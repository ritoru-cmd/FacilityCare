@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">

            <div class="flex justify-between items-center mb-6">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Detail Laporan Kerusakan
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Informasi lengkap laporan kerusakan fasilitas.
                    </p>

                </div>

                <div class="flex gap-2">

                    <a href="{{ route('laporan-kerusakan.index') }}"
                        class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 hover:bg-gray-200 transition">

                        ← Kembali

                    </a>

                    <a href="{{ route('laporan-kerusakan.edit', $laporanKerusakan->id) }}"
                        class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">

                        ✏️ Edit

                    </a>

                </div>

            </div>
            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <p class="mb-4">

                        <strong>Fasilitas:</strong><br>

                        {{ $laporanKerusakan->fasilitas->nama_fasilitas ?? '-' }}

                    </p>

                    <p class="mb-4">

                        <strong>Pelapor:</strong><br>

                        {{ $laporanKerusakan->pelapor }}

                    </p>

                    <p class="mb-4">

                        <strong>Judul Laporan:</strong><br>

                        {{ $laporanKerusakan->judul_laporan }}

                    </p>

                </div>

                <div>

                    <p class="mb-4">

                        <strong>Status:</strong><br>

                        @if($laporanKerusakan->status == 'Menunggu')

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                ⏳ Menunggu
                            </span>

                        @elseif($laporanKerusakan->status == 'Diproses')

                            <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-sm">
                                🔧 Diproses
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                ✅ Selesai
                            </span>

                        @endif

                    </p>

                    <p class="mb-4">

                        <strong>Tanggal Lapor:</strong><br>

                        {{ \Carbon\Carbon::parse($laporanKerusakan->tanggal_lapor)->format('d M Y') }}

                    </p>

                </div>

            </div>

            <div class="grid md:grid-cols-2 gap-6 mt-6">

                {{-- Foto --}}
                <div>

                    <h3 class="font-semibold text-gray-800 mb-3">
                        Foto Kerusakan
                    </h3>

                    @if($laporanKerusakan->foto)

                        <img src="{{ asset('storage/' . $laporanKerusakan->foto) }}" alt="Foto Kerusakan"
                            class="rounded-2xl border shadow-md w-full max-w-md">

                    @else

                        <div class="h-64 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 border">

                            📷 Tidak ada foto

                        </div>

                    @endif

                </div>

                {{-- Deskripsi --}}
                <div>

                    <h3 class="font-semibold text-gray-800 mb-3">
                        Deskripsi Kerusakan
                    </h3>

                    <div class="bg-gray-50 rounded-xl p-4 text-gray-700 min-h-[260px]">

                        {{ $laporanKerusakan->deskripsi_kerusakan }}

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection