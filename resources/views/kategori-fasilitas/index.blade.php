@extends('layouts.app')

@section('title', 'Kategori Fasilitas')

@section('content')

    <div class="max-w-7xl mx-auto p-6">

        <div class="bg-white p-6 rounded shadow">

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Kategori Fasilitas
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Kelola dan atur pengelompokan fasilitas yang tersedia.
                    </p>

                </div>

                @auth

                    @if(auth()->user()->role === 'admin')

                        <a href="{{ route('kategori-fasilitas.create') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600
                                hover:from-blue-700 hover:to-indigo-700
                                text-white px-3 py-2 rounded-xl
                                shadow-lg transition-all">

                            + Tambah Kategori

                        </a>

                    @endif

                @endauth

            </div>

            <form method="GET" class="mb-6">

                <div class="flex gap-3">

                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari kategori..." class="flex-1 border border-gray-300 rounded-xl px-4 py-3
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <button class="bg-blue-600 hover:bg-blue-700
                    text-white px-5 rounded-xl transition-all">

                        Cari

                    </button>

                </div>

            </form>

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="bg-gray-50 text-gray-600 uppercase text-sm">

                                <th class="p-4 text-left">
                                    No
                                </th>

                                <th class="p-4 text-left">
                                    Nama Kategori
                                </th>

                                <th class="p-4 text-left">
                                    Deskripsi
                                </th>

                                <th class="p-4 text-left">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($kategoriFasilitas as $item)

                                <tr class="border-t hover:bg-blue-50 transition">

                                    <td class="p-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="p-4 font-medium text-gray-800">
                                        {{ $item->nama_kategori }}
                                    </td>

                                    <td class="p-4 text-gray-600">
                                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 60) }}
                                    </td>

                                    <td class="p-4 space-x-2">

                                        @auth

                                            @if(auth()->user()->role === 'admin')

                                                <a href="{{ route('kategori-fasilitas.show', $item->id) }}"
                                                    class="px-3 py-1 rounded-lg bg-green-100 text-green-700">

                                                    Detail

                                                </a>

                                                <a href="{{ route('kategori-fasilitas.edit', $item->id) }}"
                                                    class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700">

                                                    Edit

                                                </a>

                                                <form action="{{ route('kategori-fasilitas.destroy', $item->id) }}" method="POST"
                                                    class="inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('Hapus data ini?')"
                                                        class="px-3 py-1 rounded-lg bg-red-100 text-red-700">

                                                        Hapus

                                                    </button>

                                                </form>

                                            @else

                                                <a href="{{ route('kategori-fasilitas.show', $item->id) }}"
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

                                    <td colspan="4" class="text-center py-12 text-gray-500">

                                        📂

                                        <div class="mt-2">
                                            Belum ada kategori fasilitas
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-6">

                {{ $kategoriFasilitas->links() }}

            </div>

        </div>

    </div>

@endsection