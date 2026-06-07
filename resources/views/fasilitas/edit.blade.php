@extends('layouts.app')

@section('title', 'Edit Fasilitas')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">
                Edit Fasilitas
            </h2>

            <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST">

                @csrf
                @method('PUT')

                @include('fasilitas._form')

            </form>
        </div>
    </div>

@endsection