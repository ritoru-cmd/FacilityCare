@extends('layouts.app')

@section('title', 'Detail Fasilitas')

@section('content')

<div class="max-w-7xl mx-auto p-6">


<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Detail Fasilitas
            </h1>

            <p class="text-gray-500 mt-1">
                Informasi lengkap fasilitas kampus.
            </p>

        </div>

        <div class="flex gap-2">

            <a
                href="{{ route('fasilitas.index') }}"
                class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 hover:bg-gray-200 transition">

                ← Kembali

            </a>

            @auth

                @if(auth()->user()->role === 'admin')

                    <a
                        href="{{ route('fasilitas.edit', $fasilitas->id) }}"
                        class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">

                        ✏️ Edit

                    </a>

                @endif

            @endauth

        </div>

    </div>

    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <p class="mb-4">
                <strong>Kategori Fasilitas:</strong><br>
                {{ $fasilitas->kategori->nama_kategori ?? '-' }}
            </p>

            <p class="mb-4">
                <strong>Kode Fasilitas:</strong><br>
                {{ $fasilitas->kode_fasilitas }}
            </p>

            <p class="mb-4">
                <strong>Nama Fasilitas:</strong><br>
                {{ $fasilitas->nama_fasilitas }}
            </p>

        </div>

        <div>

            <p class="mb-4">
                <strong>Lokasi:</strong><br>
                {{ $fasilitas->lokasi }}
            </p>

            <p class="mb-4">

                <strong>Kondisi:</strong><br>

                @if($fasilitas->kondisi == 'Baik')

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                        ✅ Baik
                    </span>

                @elseif($fasilitas->kondisi == 'Rusak Ringan')

                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                        ⚠️ Rusak Ringan
                    </span>

                @else

                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                        ❌ Rusak Berat
                    </span>

                @endif

            </p>

        </div>

    </div>

    <div class="mt-6">

        <h3 class="font-semibold text-gray-800 mb-2">
            Deskripsi
        </h3>

        <div class="bg-gray-50 rounded-xl p-4 text-gray-700">

            {{ $fasilitas->deskripsi }}

        </div>

    </div>

</div>


</div>

@endsection
