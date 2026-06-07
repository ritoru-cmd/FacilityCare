<div class="mb-4">

    
    <label class="block mb-2 font-medium text-gray-700">
        Nama Kategori
    </label>

    <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategoriFasilitas->nama_kategori ?? '') }}"
        class="w-full border border-gray-300 rounded-xl px-4 py-3
    focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    

</div>

<div class="mb-4">

    
    <label class="block mb-2 font-medium text-gray-700">
        Deskripsi
    </label>

    <textarea name="deskripsi" rows="4"
        class="w-full border border-gray-300 rounded-xl px-4 py-3
    focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi', $kategoriFasilitas->deskripsi ?? '') }}</textarea>
    

</div>

<div class="flex justify-end gap-3 mt-6">

    
    <a href="{{ route('kategori-fasilitas.index') }}" class="px-4 py-2 rounded-xl
    bg-gray-100 text-gray-700
    hover:bg-gray-200
    transition">

        ← Kembali

    </a>

    <button type="submit" class="px-4 py-2 rounded-xl
    bg-gradient-to-r
    from-blue-600 to-indigo-600
    hover:from-blue-700 hover:to-indigo-700
    text-white
    shadow-lg
    transition-all duration-200">

        💾 Simpan

    </button>
    

</div>