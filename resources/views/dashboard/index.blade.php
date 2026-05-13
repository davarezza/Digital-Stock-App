@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Dashboard</title>
@endsection

@section('container')
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
    @foreach ($stats as $stat)
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 hover:shadow-md transition">
        <div class="flex items-start justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 {{ $stat['color'] }} rounded-xl flex items-center justify-center shrink-0">
                    <i class="{{ $stat['icon'] }} {{ $stat['icolor'] }} text-base"></i>
                </div>
                <div>
                    <p class="text-xl font-extrabold text-gray-900 leading-none">{{ $stat['value'] }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $stat['label'] }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-6">
    <div class="xl:col-span-2 bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-base font-bold text-gray-900">Aktivitas Difavoritkan (7 Hari Terakhir)</h2>
            <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5">
                <span class="text-xs font-medium text-gray-600">Pertumbuhan</span>
            </div>
        </div>
        <canvas id="wishlistChart" height="160"></canvas>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <h2 class="text-base font-bold text-gray-900 mb-4">Kategori Teratas</h2>
        <div class="space-y-5">
            @foreach ($topCategories as $cat)
            <div>
                <div class="flex justify-between text-xs mb-1">
                    <span class="font-semibold text-gray-700">{{ $cat->name }}</span>
                    <span class="text-gray-400">{{ $cat->products_count }} Barang</span>
                </div>
                <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                    @php
                        $totalAllProducts = \App\Models\Product::count() ?: 1;
                        $pct = ($cat->products_count / $totalAllProducts) * 100;
                    @endphp
                    <div class="bg-cyan-500 h-full rounded-full" style="width:{{ $pct }}%"></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="border-t border-gray-100 mt-6 pt-4 space-y-3">
             <h3 class="text-xs font-bold text-gray-400 uppercase">Produk Populer</h3>
             @foreach($popularProducts as $p)
             <div class="flex items-center justify-between">
                 <span class="text-xs text-gray-600 truncate mr-2">{{ $p->name }}</span>
                 <span class="text-[10px] font-bold bg-rose-50 text-rose-500 px-2 py-0.5 rounded-full">{{ $p->wishlists_count }} ♥</span>
             </div>
             @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const wishlistCtx = document.getElementById('wishlistChart').getContext('2d');
    new Chart(wishlistCtx, {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Ditambahkan ke Favorit',
                data: @json($chartValues),
                backgroundColor: 'rgba(6, 182, 212, 0.85)',
                borderRadius: 6,
                barPercentage: 0.5
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f3f4f6' }, ticks: { font: { size: 11 } } },
                x: { grid: { display: false }, ticks: { font: { size: 11 } } }
            }
        }
    });
</script>

@endsection
