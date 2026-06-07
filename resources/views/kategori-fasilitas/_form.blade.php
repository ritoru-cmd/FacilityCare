<div class="mb-4">
    <label class="block mb-2">
        Nama Kategori
    </label>

    <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategoriFasilitas->nama_kategori ?? '') }}"
        class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block mb-2">
        Deskripsi
    </label>

    <textarea name="deskripsi"
        class="w-full border rounded p-2">{{ old('deskripsi', $kategoriFasilitas->deskripsi ?? '') }}</textarea>
</div>

<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
    Simpan
</button>