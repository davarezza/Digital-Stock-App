@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Wishlist</title>
@endsection

@section('container')
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Master Data</p>
        <h1 class="text-xl font-extrabold text-gray-900">Wishlist</h1>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-[11px] font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 bg-gray-50/60">
                    <th class="text-left px-5 py-3 w-14">#</th>
                    <th class="text-left px-5 py-3">Barang</th>
                    <th class="text-left px-5 py-3">Harga</th>
                    <th class="text-left px-5 py-3">Stok</th>
                    <th class="text-left px-5 py-3">Difavoritkan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">

                @forelse ($wishlists ?? [] as $index => $wishlist)
                <tr class="hover:bg-gray-50/60 transition">
                    <td class="px-5 py-4 text-xs text-gray-400 font-medium">
                        {{ $index + 1 }}
                    </td>

                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 rounded-xl overflow-hidden bg-gray-100 shrink-0 border border-gray-200">
                                @if ($wishlist->image)
                                    <img src="{{ asset('img/products/' . $wishlist->image) }}"
                                         alt="{{ $wishlist->product_name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fa-regular fa-image text-gray-300 text-lg"></i>
                                    </div>
                                @endif
                            </div>
                            <span class="text-sm font-semibold text-gray-800">{{ $wishlist->product_name }}</span>
                        </div>
                    </td>

                    <td class="px-5 py-4 text-sm font-semibold text-gray-700">
                        Rp {{ number_format($wishlist->price, 0, ',', '.') }}
                    </td>

                    <td class="px-5 py-4">
                        <span class="text-xs font-semibold
                            {{ $wishlist->stock > 10 ? 'text-green-600 bg-green-50 border-green-100' : 'text-red-500 bg-red-50 border-red-100' }}
                            border px-2.5 py-1 rounded-full">
                            {{ $wishlist->stock }} pcs
                        </span>
                    </td>

                    <td class="px-5 py-4">
                        <span class="text-xs font-semibold bg-yellow-50 text-yellow-600 border border-yellow-100 px-2.5 py-1 rounded-full">
                            {{ $wishlist->total_favorites }} favorit
                        </span>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
