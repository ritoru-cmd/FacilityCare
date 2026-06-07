<div class="mb-4">
    <label class="block mb-2">
        Kode Fasilitas
    </label>

    <input type="text" name="kode_fasilitas" value="{{ old('kode_fasilitas', $fasilitas->kode_fasilitas ?? '') }}"
        class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block mb-2">
        Nama Fasilitas
    </label>

    <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas ?? '') }}"
        class="w-full border rounded p-2">
</div>


<div class="mb-4">
    <label class="block mb-2">
        Kategori Fasilitas
    </label>
    <select name="kategori_fasilitas_id" class="w-full border rounded p-2">
        <option value="">
            Pilih Kategori
        </option>

        @foreach($kategoriFasilitas as $kategori)

            <option value="{{ $kategori->id }}" @selected(
                old(
                    'kategori_fasilitas_id',
                    $fasilitas->kategori_fasilitas_id ?? ''
                ) == $kategori->id
            )>
                {{ $kategori->nama_kategori }}
            </option>

        @endforeach

    </select>
</div>
<div class="mb-4 mt-4">
    <label class="block mb-2">
        Lokasi
    </label>

    <input type="text" name="lokasi" value="{{ old('lokasi', $fasilitas->lokasi ?? '') }}"
        class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block mb-2">
        Kondisi
    </label>
    <select name="kondisi" class="w-full border rounded p-2">
        <option value="">
            Pilih Kondisi
        </option>
        @foreach(['Baik', 'Rusak Ringan', 'Rusak Berat'] as $kondisi)

            <option value="{{ $kondisi }}" @selected(
                old('kondisi', $fasilitas->kondisi ?? '') == $kondisi
            )>
                {{ $kondisi }}
            </option>
        @endforeach


    </select>
</div>

<div class="mb-4">
    <label class="block mb-2">
        Deskripsi
    </label>

    <textarea name="deskripsi"
        class="w-full border rounded p-2">{{ old('deskripsi', $fasilitas->deskripsi ?? '') }}</textarea>
</div>



<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
    Simpan
</button>