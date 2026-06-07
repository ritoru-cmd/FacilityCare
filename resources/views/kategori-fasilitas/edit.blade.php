@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">
                Edit Kategori
            </h2>

            <form action="{{ route('kategori-fasilitas.update', $kategoriFasilitas->id) }}" method="POST">

                @csrf
                @method('PUT')

                @include('kategori-fasilitas._form')

            </form>
        </div>
    </div>
@endsection