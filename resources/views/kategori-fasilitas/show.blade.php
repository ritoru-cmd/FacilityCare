@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-2xl font-bold mb-4">
                Detail Kategori
            </h2>

            <p>
                <strong>Nama:</strong>
                {{ $kategoriFasilitas->nama_kategori }}
            </p>

            <p class="mt-2">
                <strong>Deskripsi:</strong>
                {{ $kategoriFasilitas->deskripsi }}
            </p>

        </div>
    </div>

@endsection