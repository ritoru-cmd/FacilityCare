<div class="mb-4">
    <label class="block mb-2">
        Fasilitas
    </label>

    <select name="fasilitas_id" class="w-full border rounded p-2">
        <option value="">
            Pilih Fasilitas
        </option>

        @foreach($fasilitas as $item)

            <option value="{{ $item->id }}" @selected(
                old(
                    'fasilitas_id',
                    $laporanKerusakan->fasilitas_id ?? ''
                ) == $item->id
            )>
                {{ $item->nama_fasilitas }}
            </option>

        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block mb-2">
        Pelapor
    </label>

    <input type="text" name="pelapor" value="{{ old('pelapor', $laporanKerusakan->pelapor ?? '') }}"
        class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block mb-2">
        Judul Laporan
    </label>

    <input type="text" name="judul_laporan" value="{{ old('judul_laporan', $laporanKerusakan->judul_laporan ?? '') }}"
        class="w-full border rounded p-2">
</div>



<div class="mb-4">
    <label class="block mb-2">
        Status
    </label>

    <select name="status" class="w-full border rounded p-2">
        <option value="">
            pilih status
        </option>
        @foreach(['Menunggu', 'Diproses', 'Selesai'] as $status)


            <option value="{{ $status }}" @selected(
                old(
                    'status',
                    $laporanKerusakan->status ?? ''
                ) == $status
            )>
                {{ $status }}
            </option>

        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block mb-2">
        Tanggal Lapor
    </label>

    <input type="date" name="tanggal_lapor" value="{{ old('tanggal_lapor', $laporanKerusakan->tanggal_lapor ?? '') }}"
        class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block mb-2">
        Foto Kerusakan
    </label>

    <input type="file" name="foto" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block mb-2">
        Deskripsi Kerusakan
    </label>

    <textarea name="deskripsi_kerusakan"
        class="w-full border rounded p-2">{{ old('deskripsi_kerusakan', $laporanKerusakan->deskripsi_kerusakan ?? '') }}</textarea>
</div>

<div class="flex justify-end gap-3 mt-6">


    <a href="{{ route('laporan-kerusakan.index') }}" class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700
    hover:bg-gray-200 transition">

        ← Kembali

    </a>

    <button type="submit" class="px-4 py-2 rounded-xl
    bg-blue-600 text-white
    hover:bg-blue-700
    transition">

        💾 Simpan

    </button>

</div>