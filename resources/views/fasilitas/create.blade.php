@extends('layouts.app')

@section('title', 'Tambah Fasilitas')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">
                Tambah Fasilitas
            </h2>

            <form action="{{ route('fasilitas.store') }}" method="POST">

                @csrf

                @include('fasilitas._form')

            </form>
        </div>
    </div>

@endsection