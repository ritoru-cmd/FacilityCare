@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')

    <div class="max-w-7xl mx-auto p-6">

        
        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Detail Kategori
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Informasi lengkap kategori fasilitas.
                    </p>

                </div>

                <div class="flex gap-2">

                    <a href="{{ route('kategori-fasilitas.index') }}"
                        class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 hover:bg-gray-200 transition">

                        ← Kembali

                    </a>

                    @auth

                        @if(auth()->user()->role === 'admin')

                            <a href="{{ route('kategori-fasilitas.edit', $kategoriFasilitas->id) }}"
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

                        <strong>Nama Kategori:</strong><br>

                        {{ $kategoriFasilitas->nama_kategori }}

                    </p>

                </div>

                <div>

                    <p class="mb-4">

                        <strong>ID Kategori:</strong><br>

                        #{{ $kategoriFasilitas->id }}

                    </p>

                </div>

            </div>

            <div class="mt-6">

                <h3 class="font-semibold text-gray-800 mb-2">
                    Deskripsi
                </h3>

                <div class="bg-gray-50 rounded-xl p-4 text-gray-700">

                    {{ $kategoriFasilitas->deskripsi }}

                </div>

            </div>

        </div>
        

    </div>

@endsection