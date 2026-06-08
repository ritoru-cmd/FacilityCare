@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-background">
        <div class="max-w-7xl mx-auto p-6">
            <div class="space-y-8">


                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Dashboard
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Monitoring laporan kerusakan fasilitas.
                    </p>
                </div>

                {{-- Statistik Utama --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div
                        class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-6 rounded-3xl shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">
                                Total Kategori
                            </h3>

                            <span class="text-2xl">
                                📂
                            </span>
                        </div>

                        <p class="text-4xl font-bold mt-4">
                            {{ $totalKategori }}
                        </p>
                    </div>

                    <div
                        class="bg-gradient-to-br from-green-600 to-emerald-700 text-white p-6 rounded-3xl shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">
                                Total Fasilitas
                            </h3>

                            <span class="text-2xl">
                                🏢
                            </span>
                        </div>

                        <p class="text-4xl font-bold mt-4">
                            {{ $totalFasilitas }}
                        </p>
                    </div>

                    <div
                        class="bg-gradient-to-br from-purple-600 to-fuchsia-700 text-white p-6 rounded-3xl shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">
                                Total Laporan
                            </h3>

                            <span class="text-2xl">
                                📋
                            </span>
                        </div>

                        <p class="text-4xl font-bold mt-4">
                            {{ $totalLaporan }}
                        </p>
                    </div>

                </div>

                {{-- Status --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div
                        class="bg-yellow-50 hover:bg-yellow-100 shadow-sm hover:shadow-lg transition-all duration-300 border-l-4 border-yellow-500 p-6 rounded-xl">
                        <h3 class="text-yellow-700 font-semibold">
                            Menunggu⏳
                        </h3>

                        <p class="text-4xl font-bold text-yellow-600 mt-2">
                            {{ $menunggu }}
                        </p>
                    </div>

                    <div
                        class="bg-orange-50 hover:bg-orange-100 shadow-sm hover:shadow-lg transition-all duration-300 border-l-4 border-orange-500 p-6 rounded-xl">
                        <h3 class="text-orange-700 font-semibold">
                            Diproses🔧
                        </h3>

                        <p class="text-4xl font-bold text-orange-600 mt-2">
                            {{ $diproses }}
                        </p>
                    </div>

                    <div
                        class="bg-green-50 hover:bg-green-100 shadow-sm hover:shadow-lg transition-all duration-300 border-l-4 p-6 rounded-xl border-l-4 border-green-500 p-6 rounded-xl">
                        <h3 class="text-green-700 font-semibold">
                            Selesai✅
                        </h3>

                        <p class="text-4xl font-bold text-green-600 mt-2">
                            {{ $selesai }}
                        </p>
                    </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <div class="bg-white p-6 rounded-3xl shadow">
                        <h2 class="font-bold text-lg mb-4">
                            Status Laporan
                        </h2>

                        <canvas id="statusChart"></canvas>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow">
                        <h2 class="font-bold text-lg mb-4">
                            Kondisi Fasilitas
                        </h2>

                        <canvas id="kondisiChart"></canvas>
                    </div>

                </div>

                <div class="bg-white p-6 rounded-3xl shadow mt-6">
                    <h2 class="font-bold text-lg mb-4">
                        Fasilitas per Kategori
                    </h2>

                    <canvas id="kategoriChart"></canvas>
                </div>

                {{-- Laporan Terbaru --}}
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

                    <div class="flex justify-between items-center p-6 border-b">

                        <h2 class="text-xl font-bold text-gray-800">
                            5 Laporan Terbaru
                        </h2>

                        <a href="{{ route('laporan-kerusakan.index') }}"
                            class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-5 py-2 rounded-xl shadow-lg transition-all">

                            Lihat Semua

                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="bg-gray-100">

                                    <th class="p-4 text-left">
                                        Pelapor
                                    </th>

                                    <th class="p-4 text-left">
                                        Fasilitas
                                    </th>

                                    <th class="p-4 text-left">
                                        Judul
                                    </th>

                                    <th class="p-4 text-left">
                                        Status
                                    </th>

                                    <th class="p-4 text-left">
                                        Tanggal
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($laporanTerbaru as $item)

                                    <tr class="border-t hover:bg-gray-50">

                                        <td class="p-4">

                                            <div class="flex items-center gap-3">

                                                <div
                                                    class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold">

                                                    {{ strtoupper(substr($item->pelapor, 0, 1)) }}

                                                </div>

                                                <span>
                                                    {{ $item->pelapor }}
                                                </span>

                                            </div>

                                        </td>

                                        <td class="p-4">
                                            {{ $item->fasilitas->nama_fasilitas ?? '-' }}
                                        </td>

                                        <td class="p-4">
                                            {{ $item->judul_laporan }}
                                        </td>

                                        <td class="p-4">

                                            @if($item->status == 'Menunggu')

                                                <span class="px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">
                                                    Menunggu
                                                </span>

                                            @elseif($item->status == 'Diproses')

                                                <span class="px-3 py-1 rounded-full text-sm bg-orange-100 text-orange-700">
                                                    Diproses
                                                </span>

                                            @else

                                                <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                                                    Selesai
                                                </span>

                                            @endif

                                        </td>

                                        <td class="p-4">
                                            {{ \Carbon\Carbon::parse($item->tanggal_lapor)->format('d M Y') }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5" class="text-center py-8 text-gray-500">

                                            Belum ada laporan kerusakan

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const statusLabels = @json($statusLabels);
        const statusValues = @json($statusValues);

        new Chart(
            document.getElementById('statusChart'),
            {
                type: 'doughnut',

                data: {
                    labels: statusLabels,

                    datasets: [{
                        data: statusValues
                    }]
                }
            }
        );
    </script>
    <script>
        const kondisiLabels = @json($kondisiLabels);
        const kondisiValues = @json($kondisiValues);

        new Chart(
            document.getElementById('kondisiChart'),
            {
                type: 'bar',

                data: {
                    labels: kondisiLabels,

                    datasets: [{
                        label: 'Jumlah',
                        data: kondisiValues
                    }]
                }
            }
        );
    </script>
    <script>
        const kategoriLabels = @json($kategoriLabels);
        const kategoriValues = @json($kategoriValues);

        new Chart(
            document.getElementById('kategoriChart'),
            {
                type: 'bar',

                data: {
                    labels: kategoriLabels,

                    datasets: [{
                        label: 'Jumlah Fasilitas',
                        data: kategoriValues
                    }]
                }
            }
        );
    </script>
@endsection