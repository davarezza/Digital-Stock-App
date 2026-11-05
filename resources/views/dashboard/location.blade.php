@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Lokasi Gudang</title>
@endsection

@section('container')
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Inventaris & Logistik</p>
        <h1 class="text-xl font-extrabold text-gray-900">Lokasi Gudang</h1>
    </div>
    <div class="flex items-center gap-2">
        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-xl">
            <i class="fa-solid fa-warehouse mr-1"></i> Multi-Gudang Aktif
        </span>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-[11px] font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 bg-gray-50/60">
                    <th class="text-left px-5 py-3">No</th>
                    <th class="text-left px-5 py-3">Nama Gudang / Unit</th>
                    <th class="text-left px-5 py-3">Alamat / Detail Lokasi</th>
                    <th class="text-center px-5 py-3">Total Variasi Item</th>
                    <th class="text-center px-5 py-3">Total Akumulasi Stok</th>
                    <th class="text-center px-5 py-3">Status Operasional</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($locations as $index => $location)
                <tr class="hover:bg-gray-50/60 transition">
                    <td class="px-5 py-4 text-xs text-gray-400 font-medium">
                        {{ $index + 1 }}
                    </td>

                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 font-bold border border-gray-200">
                                <i class="fa-solid fa-house-chimney-crack text-sm"></i>
                            </div>
                            <div>
                                <h2 class="text-sm font-bold text-gray-900">{{ $location->unit_name }}</h2>
                                <span class="text-[11px] text-gray-400">ID Gudang: #LOC-0{{ $location->id }}</span>
                            </div>
                        </div>
                    </td>

                    <td class="px-5 py-4 text-xs text-gray-600">
                        {{ $location->address ?? 'Lokasi Utama Distribusi' }}
                    </td>

                    <td class="px-5 py-4 text-center">
                        <span class="text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100 px-3 py-1 rounded-full">
                            {{ $location->inventories_count ?? 0 }} Produk
                        </span>
                    </td>

                    <td class="px-5 py-4 text-center">
                        <span class="text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-100 px-3 py-1 rounded-full">
                            {{ number_format($location->total_stock_pcs ?? 0, 0, ',', '.') }} Pcs
                        </span>
                    </td>

                    <td class="px-5 py-4 text-center">
                        <span class="text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200 px-2.5 py-1 rounded-md">
                            Aktif Menyimpan
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-8 text-center text-gray-400 text-sm">
                        Belum ada lokasi gudang yang terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-5 py-3 border-t border-gray-100 bg-gray-50/40 flex items-center justify-between">
        <p class="text-xs text-gray-400">
            Total <span class="font-semibold text-gray-600">{{ count($locations) }}</span> unit gudang terdaftar
        </p>
    </div>
</div>
@endsection