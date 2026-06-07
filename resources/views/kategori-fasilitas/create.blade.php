@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">
                Tambah Kategori
            </h2>

            <form action="{{ route('kategori-fasilitas.store') }}" method="POST">

                @csrf

                @include('kategori-fasilitas._form')

            </form>
        </div>
    </div>
@endsection