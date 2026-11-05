@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Kelola Pesanan</title>
@endsection

@section('container')
{{-- Header Halaman --}}
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Transaksi & Distribusi</p>
        <h1 class="text-xl font-extrabold text-gray-900">Kelola Pesanan</h1>
    </div>
    <div class="flex items-center gap-2">
        <span class="text-xs font-medium text-gray-500 bg-gray-100 px-3 py-1.5 rounded-lg border border-gray-200">
            <i class="fa-solid fa-sync text-gray-400 mr-1"></i> Sinkron Otomatis via WA
        </span>
    </div>
</div>

{{-- Tabel Utama Pesanan --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-[11px] font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 bg-gray-50/60">
                    <th class="text-left px-5 py-3">No. Pesanan & Tanggal</th>
                    <th class="text-left px-5 py-3">Pelanggan</th>
                    <th class="text-left px-5 py-3">Tipe</th>
                    <th class="text-left px-5 py-3">Total Transaksi</th>
                    <th class="text-center px-5 py-3">Status Pesanan</th>
                    <th class="text-center px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($orders as $order)
                <tr class="hover:bg-gray-50/60 transition">
                    {{-- Kode Order & Waktu --}}
                    <td class="px-5 py-4">
                        <span class="font-mono text-xs font-bold text-gray-800 bg-gray-100 px-2 py-0.5 rounded border border-gray-200">
                            #{{ $order->order_number }}
                        </span>
                        <div class="text-[11px] text-gray-400 mt-1 flex items-center gap-1">
                            <i class="fa-regular fa-clock text-[10px]"></i>
                            {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : '-' }}
                        </div>
                    </td>

                    {{-- Data Pelanggan --}}
                    <td class="px-5 py-4">
                        <div class="text-sm font-semibold text-gray-900">
                            {{ $order->customer_name }}
                        </div>
                        <div class="text-xs text-gray-500 flex items-center gap-1 mt-0.5">
                            <i class="fa-brands fa-whatsapp text-emerald-500 font-bold"></i>
                            {{ $order->customer_phone }}
                        </div>
                    </td>

                    {{-- Tipe Pesanan --}}
                    <td class="px-5 py-4">
                        <span class="text-xs font-medium px-2.5 py-1 rounded-md capitalize 
                            {{ $order->order_type === 'whatsapp' ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-gray-100 text-gray-600 border border-gray-200' }}">
                            {{ $order->order_type }}
                        </span>
                    </td>

                    {{-- Total Nilai --}}
                    <td class="px-5 py-4">
                        <span class="text-sm font-extrabold text-gray-900">
                            Rp {{ number_format($order->total_value, 0, ',', '.') }}
                        </span>
                    </td>

                    {{-- Status Badge --}}
                    <td class="px-5 py-4 text-center">
                        @php
                            $statusClasses = [
                                'pending'   => 'bg-amber-50 text-amber-600 border-amber-200',
                                'processed' => 'bg-blue-50 text-blue-600 border-blue-200',
                                'completed' => 'bg-emerald-50 text-emerald-600 border-emerald-200',
                                'cancelled' => 'bg-rose-50 text-rose-600 border-rose-200',
                            ];
                        @endphp
                        <span class="text-xs font-bold border px-3 py-1 rounded-full capitalize {{ $statusClasses[$order->status] ?? 'bg-gray-50 text-gray-600 border-gray-200' }}">
                            {{ $order->status }}
                        </span>
                    </td>

                    {{-- Tombol Akses (Lihat, Edit, Hapus) --}}
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-center gap-1.5">
                            {{-- Detail Order --}}
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                               class="flex items-center gap-1 text-xs font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 border border-blue-100 px-2.5 py-1.5 rounded-lg transition"
                               title="Lihat Detail Rincian Pesanan">
                                <i class="fa-regular fa-eye text-xs"></i>
                                Detail
                            </a>

                            {{-- Edit / Revisi --}}
                            <a href="{{ route('admin.orders.edit', $order->id) }}"
                               class="flex items-center gap-1 text-xs font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 border border-gray-200 px-2.5 py-1.5 rounded-lg transition"
                               title="Edit Status / Item Pesanan">
                                <i class="fa-regular fa-pen-to-square text-xs"></i>
                                Edit
                            </a>

                            {{-- Hapus / Batal --}}
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus catatan pesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center gap-1 text-xs font-semibold text-rose-600 bg-rose-50 hover:bg-rose-100 border border-rose-100 px-2.5 py-1.5 rounded-lg transition"
                                    title="Hapus Pesanan">
                                    <i class="fa-regular fa-trash-can text-xs"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-10 text-center text-gray-400 text-sm">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <i class="fa-regular fa-folder-open text-2xl text-gray-300"></i>
                            <p class="font-medium text-gray-500">Belum ada pesanan masuk dari pelanggan.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Footer Pagination --}}
    <div class="px-5 py-3.5 border-t border-gray-100 bg-gray-50/40 flex items-center justify-between">
        <p class="text-xs text-gray-500">
            Total <span class="font-bold text-gray-800">{{ method_exists($orders, 'total') ? $orders->total() : count($orders) }}</span> pesanan tercatat
        </p>
        @if (method_exists($orders, 'links'))
            <div class="text-xs">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection