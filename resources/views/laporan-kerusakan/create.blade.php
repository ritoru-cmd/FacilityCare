@extends('layouts.app')

@section('title', 'Tambah Laporan')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">
                Tambah Laporan Kerusakan
            </h2>

            <form action="{{ route('laporan-kerusakan.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                @include('laporan-kerusakan._form')

            </form>
        </div>
    </div>

@endsection