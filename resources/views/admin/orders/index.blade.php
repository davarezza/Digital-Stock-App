@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Pesanan</title>
@endsection

@section('container')
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Master Data</p>
        <h1 class="text-xl font-extrabold text-gray-900">order</h1>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm" id="order-table">
            <thead>
                <tr class="text-[11px] font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 bg-gray-50/60">
                    <th class="text-left px-5 py-3 w-14">#</th>
                    <th class="text-left px-5 py-3">Nama Pelanggan</th>
                    <th class="text-left px-5 py-3">Total Harga</th>
                    <th class="text-left px-5 py-3">Status</th>
                    <th class="text-center px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50" id="table-body">

                @forelse ($orders ?? [] as $index => $order)
                <tr class="hover:bg-gray-50/60 transition table-row">
                    <td class="px-5 py-4 text-xs text-gray-400 font-medium">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-semibold text-gray-800">{{ $order->customer_name }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-semibold text-gray-800">{{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-semibold text-gray-800">{{ $order->status }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                               class="flex items-center gap-1 bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-lg transition">
                                <i class="fa-solid fa-eye"></i>
                                Lihat
                            </a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus order ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center gap-1 bg-red-600 hover:bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-lg transition">
                                    <i class="fa-solid fa-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-4 text-center text-sm text-gray-500">
                        Tidak ada order ditemukan.
                    </td>
                </tr>
                @endempty
            </tbody>
        </table>
    </div>
</div>
@endsection