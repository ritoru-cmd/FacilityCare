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
            <p><strong>Fasilitas:</strong> {{ $laporanKerusakan->fasilitas->nama_fasilitas ?? '-' }}</p>

            <p class="mt-2"><strong>Pelapor:</strong> {{ $laporanKerusakan->pelapor }}</p>

            <p class="mt-2"><strong>Judul:</strong> {{ $laporanKerusakan->judul_laporan }}</p>

            <p class="mt-2"><strong>Status:</strong> {{ $laporanKerusakan->status }}</p>

            <p class="mt-2"><strong>Tanggal:</strong> {{ $laporanKerusakan->tanggal_lapor }}</p>

            @if($laporanKerusakan->foto)

                <div class="mt-4">

                    <strong>Foto Kerusakan:</strong>

                    <img src="{{ asset('storage/' . $laporanKerusakan->foto) }}" class="mt-2 rounded border w-64">

                </div>

            @endif

            <p class="mt-2"><strong>Deskripsi:</strong></p>

            <p>
                {{ $laporanKerusakan->deskripsi_kerusakan }}
            </p>

        </div>
    </div>
@endsection