@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Detail Barang</title>
@endsection

@section('container')

{{-- Header --}}
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Master Data</p>
        <h1 class="text-xl font-extrabold text-gray-900">Detail Barang</h1>
    </div>
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.products.edit', $product->id) }}"
           class="flex items-center gap-2 text-sm font-semibold text-gray-600 bg-white border border-gray-200 hover:bg-gray-50 px-4 py-2.5 rounded-xl transition shadow-sm">
            <i class="fa-regular fa-pen-to-square text-xs"></i>
            Edit
        </a>
        <a href="{{ route('admin.products.index') }}"
           class="flex items-center gap-2 text-sm font-semibold text-gray-600 bg-white border border-gray-200 hover:bg-gray-50 px-4 py-2.5 rounded-xl transition shadow-sm">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center shrink-0">
                <i class="fa-solid fa-box text-white text-xs"></i>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-800 leading-none">{{ $product->name }}</p>
                <p class="text-xs text-gray-400 mt-0.5">ID #{{ $product->id }}</p>
            </div>
        </div>
        <span class="text-xs font-semibold
            {{ ($product->stock ?? 0) > 10 ? 'bg-green-50 text-green-600 border-green-100' : 'bg-red-50 text-red-500 border-red-100' }}
            border px-3 py-1.5 rounded-full">
            {{ ($product->stock ?? 0) > 10 ? 'Stok Tersedia' : 'Stok Menipis' }}
        </span>
    </div>

    <div class="p-6 space-y-6">
        <div class="grid grid-cols-3 gap-6">
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Gambar</p>
                <div class="w-full aspect-square rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 max-w-45">
                    @if ($product->image)
                        <img src="{{ asset('img/products/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center gap-2">
                            <i class="fa-regular fa-image text-gray-300 text-3xl"></i>
                            <p class="text-xs text-gray-300">Tidak ada gambar</p>
                        </div>
                    @endif
                </div>
            </div>

            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Barang</p>
                <p class="text-sm font-bold text-gray-800">{{ $product->name }}</p>
            </div>

            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Kategori</p>
                <span class="text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100 px-3 py-1.5 rounded-full">
                    {{ $product->category->name ?? '-' }}
                </span>
            </div>

        </div>

        <div class="border-t border-gray-100"></div>
        <div class="grid grid-cols-3 gap-6">

            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Harga</p>
                <p class="text-xl font-extrabold text-gray-900">
                    Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                </p>
            </div>

            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Stok</p>
                <div class="flex items-end gap-1.5">
                    <p class="text-xl font-extrabold text-gray-900">{{ $product->stock ?? 0 }}</p>
                    <p class="text-sm text-gray-400 mb-0.5">pcs</p>
                </div>
            </div>

            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Status Terlaris</p>
                @if (($product->sold ?? 0) >= 100)
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-yellow-50 text-yellow-600 border border-yellow-100 px-3 py-1.5 rounded-full">
                        <i class="fa-solid fa-fire text-xs"></i>
                        Terlaris
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-gray-100 text-gray-400 border border-gray-200 px-3 py-1.5 rounded-full">
                        <i class="fa-regular fa-minus text-xs"></i>
                        Reguler
                    </span>
                @endif
            </div>
        </div>

        <div class="border-t border-gray-100"></div>
        <div class="grid grid-cols-3 gap-6">
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Deskripsi</p>
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $product->unit_description ?? 'Tidak ada deskripsi.' }}
                </p>
            </div>

            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Ditambahkan</p>
                <p class="text-sm text-gray-600">{{ $product->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Terakhir Diperbarui</p>
                <p class="text-sm text-gray-600">{{ $product->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
