@extends('layouts.app')

@section('title', 'Detail Fasilitas')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-2xl font-bold mb-4">
                Detail Fasilitas
            </h2>

            <p class="mt-2">
                <strong>Kategori Fasilitas:</strong>
                {{ $fasilitas->kategori->nama_kategori ?? '-' }}
            </p>
            <p class="mt-2">
                <strong>Kode Fasilitas:</strong>
                {{ $fasilitas->kode_fasilitas }}
            </p>
            <p class="mt-2">
                <strong>Nama:</strong>
                {{ $fasilitas->nama_fasilitas }}
            </p>
            <p class="mt-2">
                <strong>Lokasi:</strong>
                {{ $fasilitas->lokasi }}
            </p>
            <p class="mt-2">
                <strong>Kondisi:</strong>
                {{ $fasilitas->kondisi }}
            </p>
            <p class="mt-2">
                <strong>Deskripsi:</strong>
                {{ $fasilitas->deskripsi }}
            </p>

            <a href="{{ route('fasilitas.index') }}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </div>

@endsection