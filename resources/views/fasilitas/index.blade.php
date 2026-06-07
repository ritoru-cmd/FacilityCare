@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-6 rounded shadow">

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Fasilitas
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Kelola data fasilitas kampus beserta kondisi dan lokasinya.
                    </p>

                </div>

                @auth

                    @if(auth()->user()->role === 'admin')

                        <a href="{{ route('fasilitas.create') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600
                                            hover:from-blue-700 hover:to-indigo-700
                                            text-white px-3 py-2 rounded-xl
                                            shadow-lg transition-all">

                            + Tambah Fasilitas

                        </a>

                    @endif

                @endauth

            </div>

            <form method="GET" class="mb-6">

                <div class="flex gap-3">

                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari fasilitas..." class="flex-1 border border-gray-300 rounded-xl px-4 py-3
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 rounded-xl transition-all">

                        Cari

                    </button>

                </div>

            </form>

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="bg-gray-50 text-gray-600 uppercase text-sm">

                                <th class="p-4 text-left">No</th>

                                <th class="p-4 text-left">Kategori</th>

                                <th class="p-4 text-left">Kode</th>

                                <th class="p-4 text-left">Nama Fasilitas</th>

                                <th class="p-4 text-left">Lokasi</th>

                                <th class="p-4 text-left">Kondisi</th>

                                <th class="p-4 text-left">Deskripsi</th>

                                <th class="p-4 text-left">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($fasilitas as $item)

                                <tr class="border-t hover:bg-blue-50 transition">

                                    <td class="p-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->kategori->nama_kategori ?? '-' }}
                                    </td>

                                    <td class="p-4 font-medium text-gray-700">
                                        {{ $item->kode_fasilitas }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->nama_fasilitas }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->lokasi }}
                                    </td>

                                    <td class="p-4">

                                        @if($item->kondisi == 'Baik')

                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                                Baik
                                            </span>

                                        @elseif($item->kondisi == 'Rusak Ringan')

                                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                                Rusak Ringan
                                            </span>

                                        @else

                                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                                {{ $item->kondisi }}
                                            </span>

                                        @endif

                                    </td>

                                    <td class="p-4 max-w-xs">
                                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 40) }}
                                    </td>

                                    <td class="p-4 space-x-2">

                                        @auth

                                            @if(auth()->user()->role === 'admin')

                                                <a href="{{ route('fasilitas.show', $item->id) }}"
                                                    class="px-3 py-1 rounded-lg bg-green-100 text-green-700">

                                                    Detail

                                                </a>

                                                <a href="{{ route('fasilitas.edit', $item->id) }}"
                                                    class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700">

                                                    Edit

                                                </a>

                                                <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" class="inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('Hapus data ini?')"
                                                        class="px-3 py-1 rounded-lg bg-red-100 text-red-700">

                                                        Hapus

                                                    </button>

                                                </form>

                                            @else

                                                <a href="{{ route('fasilitas.show', $item->id) }}"
                                                    class="px-3 py-1 rounded-lg bg-green-100 text-green-700">

                                                    Detail

                                                </a>

                                                <button type="button" onclick="alert('Anda tidak memiliki akses ke halaman ini.')"
                                                    class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700">

                                                    Edit 🔒

                                                </button>

                                                <button type="button" onclick="alert('Anda tidak memiliki akses ke halaman ini.')"
                                                    class="px-3 py-1 rounded-lg bg-red-100 text-red-700">

                                                    Hapus 🔒

                                                </button>

                                            @endif

                                        @endauth

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center py-12 text-gray-500">

                                        🏢

                                        <div class="mt-2">
                                            Belum ada data fasilitas
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-6">

                {{ $fasilitas->links() }}

            </div>

        </div>

    </div>

@endsection