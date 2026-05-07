@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Edit Barang</title>
@endsection

@section('container')

{{-- Header --}}
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Master Data</p>
        <h1 class="text-xl font-extrabold text-gray-900">Edit Barang</h1>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
        <div class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center shrink-0">
            <i class="fa-solid fa-tag text-white text-xs"></i>
        </div>
        <div>
            <p class="text-sm font-bold text-gray-800 leading-none">Form Barang</p>
            <p class="text-xs text-gray-400 mt-0.5">Field yang bertanda * wajib diisi</p>
        </div>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                Nama Barang <span class="text-red-400">*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $product->name) }}"
                placeholder="Contoh: Sembako, Minuman, Snack..."
                class="w-full px-4 py-2.5 text-sm text-gray-800 bg-gray-50 border rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition placeholder-gray-300
                       @error('name') border-red-300 @else @enderror"
            >
            @error('name')
                <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
             <label for="category_id" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                Kategori <span class="text-red-400">*</span>
            </label>
            <select
                name="category_id" id="category_id"
                class="w-full px-4 py-2.5 text-sm text-gray-800 bg-gray-50 border rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition appearance-none cursor-pointer @error('category_id') border-red-300 @else @enderror">
                <option value="" disabled {{ old('category_id') ? '' : 'selected' }} class="text-gray-300">
                    -- Pilih Kategori --
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="unit_description" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                Deskripsi Satuan <span class="text-red-400">*</span>
            </label>
            <input
                type="text" name="unit_description" id="unit_description" value="{{ old('unit_description', $product->unit_description) }}" placeholder="Contoh: 1 Dus = 12 Pcs..."
                class="w-full px-4 py-2.5 text-sm text-gray-800 bg-gray-50 border rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition placeholder-gray-300 @error('unit_description') border-red-300 @else @enderror">
            @error('unit_description')
                 <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="price" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                    Harga Barang <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-300 text-xs font-semibold select-none pointer-events-none">
                        Rp
                    </span>
                    <input
                        type="number" name="price" id="price" value="{{ old('price', $product->price) }}" placeholder="15.000"
                        class="w-full pl-9 pr-4 py-2.5 text-sm text-gray-800 bg-gray-50 border rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition placeholder-gray-300 @error('price') border-red-300 @else @enderror">
                </div>
                @error('price')
                    <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label for="stock" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                    Stok <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <input
                        type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" placeholder="0" min="0"
                        class="w-full pl-4 pr-12 py-2.5 text-sm text-gray-800 bg-gray-50 border rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition placeholder-gray-300 @error('stock') border-red-300 @else @enderror">
                </div>
                @error('stock')
                    <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="flex gap-6 mt-4">
            <div class="flex items-center">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_visible" value="1" class="sr-only peer" {{ old('is_visible', $product->is_visible) ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-green-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    <span class="ml-3 text-sm font-medium text-gray-700">Tampilkan di Katalog</span>
                </label>
            </div>
            <div class="flex items-center">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_best_seller" value="1" class="sr-only peer" {{ old('is_best_seller', $product->is_best_seller) ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-purple-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    <span class="ml-3 text-sm font-medium text-gray-700">Tandai Terlaris</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                Gambar Barang
                <span class="ml-1 text-[10px] font-normal text-gray-300 normal-case tracking-normal">(opsional, maks. 2MB)</span>
            </label>
            <label for="image"
                class="group flex flex-col items-center justify-center w-full border-2 border-dashed rounded-xl px-4 py-6 cursor-pointer transition
                    @error('image') border-red-300 bg-red-50 hover:bg-red-50 @else hover:border-gray-300 @enderror"
                id="upload-area">
                <div id="upload-placeholder" class="flex flex-col items-center gap-2 text-center">
                    <div class="w-10 h-10 bg-white border border-gray-200 rounded-xl flex items-center justify-center shadow-sm group-hover:shadow transition">
                        <i class="fa-regular fa-image text-gray-400 text-base"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Klik untuk upload gambar</p>
                        <p class="text-xs text-gray-400 mt-0.5">PNG, JPG, WEBP — maks. 2MB</p>
                    </div>
                </div>
                <input type="file" name="image" id="image" accept="image/*" class="hidden">
            </label>

            <div id="image-preview-wrapper" class="{{ $product->image ? '' : 'hidden' }} mt-3">
                <div class="flex items-start gap-3 p-3 bg-gray-50 border border-gray-200 rounded-xl">
                    <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 shrink-0 bg-white">
                        <img id="image-preview"
                            src="{{ $product->image ? asset('img/products/' . $product->image) : '#' }}"
                            alt="Preview"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0 pt-1">
                        <p id="preview-filename" class="text-xs font-semibold text-gray-700 truncate">
                            {{ $product->image ?? '' }}
                        </p>
                        <p id="preview-filesize" class="text-xs text-gray-400 mt-0.5">
                            {{ $product->image ? 'Gambar saat ini' : '' }}
                        </p>
                    </div>
                </div>
            </div>

            @error('image')
                <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="border-t border-gray-100"></div>
        <div class="flex items-center justify-end gap-3 pt-1">
            <a href="{{ route('admin.products.index') }}"
               class="text-sm font-semibold text-gray-500 hover:text-gray-800 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit"
                class="flex items-center gap-2 bg-gray-900 hover:bg-gray-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition shadow-sm">
                <i class="fa-solid fa-floppy-disk text-xs"></i>
                Simpan Barang
            </button>
        </div>

    </form>
</div>

<script>
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    nameInput.addEventListener('input', function () {
        const slug = this.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        slugInput.value = slug;
    });

    const imageInput      = document.getElementById('image');
    const previewWrapper  = document.getElementById('image-preview-wrapper');
    const previewImg      = document.getElementById('image-preview');
    const previewFilename = document.getElementById('preview-filename');
    const previewFilesize = document.getElementById('preview-filesize');
    const removeBtn       = document.getElementById('remove-image');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => {
            previewImg.src = e.target.result;
            previewFilename.textContent = file.name;
            previewFilesize.textContent = (file.size / 1024).toFixed(1) + ' KB';
            previewWrapper.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    });

    removeBtn.addEventListener('click', function () {
        imageInput.value = '';
        previewImg.src = '#';
        previewWrapper.classList.add('hidden');
    });
</script>

@endsection
