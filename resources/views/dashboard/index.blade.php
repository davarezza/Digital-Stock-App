@extends('layouts.master')

@section('title')
    <title>{{ config('app.name') }} | Dashboard</title>
@endsection

@section('container')

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

    @php
    $stats = [
        [
            'label'   => 'Profit',
            'value'   => '$9,458,798',
            'change'  => '+35%',
            'up'      => true,
            'color'   => 'bg-blue-100',
            'icon'    => 'fa-solid fa-layer-group',
            'icolor'  => 'text-blue-500',
        ],
        [
            'label'   => 'Invoice Due',
            'value'   => '$48,988.78',
            'change'  => '+35%',
            'up'      => true,
            'color'   => 'bg-teal-100',
            'icon'    => 'fa-regular fa-clock',
            'icolor'  => 'text-teal-500',
        ],
        [
            'label'   => 'Total Expenses',
            'value'   => '$8,980,097',
            'change'  => '+35%',
            'up'      => true,
            'color'   => 'bg-orange-100',
            'icon'    => 'fa-solid fa-circle-dollar-to-slot',
            'icolor'  => 'text-orange-500',
        ],
        [
            'label'   => 'Total Payment Returns',
            'value'   => '$78,458,798',
            'change'  => '-20%',
            'up'      => false,
            'color'   => 'bg-purple-100',
            'icon'    => 'fa-solid fa-hashtag',
            'icolor'  => 'text-purple-500',
        ],
    ];
    @endphp

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
            <button class="text-gray-300 hover:text-gray-500 transition mt-1">
                <i class="fa-solid fa-ellipsis-vertical text-sm"></i>
            </button>
        </div>
        <div class="flex items-center gap-1.5">
            @if ($stat['up'])
                <i class="fa-solid fa-arrow-trend-up text-green-500 text-xs"></i>
                <span class="text-xs font-bold text-green-500">{{ $stat['change'] }}</span>
            @else
                <i class="fa-solid fa-arrow-trend-down text-red-500 text-xs"></i>
                <span class="text-xs font-bold text-red-500">{{ $stat['change'] }}</span>
            @endif
            <span class="text-xs text-gray-400">vs Last Month</span>
        </div>
    </div>
    @endforeach

</div>

{{-- Charts Row --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-6">

    {{-- Sales & Purchase Chart --}}
    <div class="xl:col-span-2 bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-base font-bold text-gray-900">Sales & Purchase</h2>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1.5">
                    <span class="w-3 h-3 rounded-sm bg-cyan-300 inline-block"></span>
                    <span class="text-xs text-gray-500">Total Purchase</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="w-3 h-3 rounded-sm bg-cyan-500 inline-block"></span>
                    <span class="text-xs text-gray-500">Total Sales</span>
                </div>
                <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5">
                    <span class="text-xs font-medium text-gray-600">This Year</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
                </div>
                <button class="text-gray-300 hover:text-gray-500 transition">
                    <i class="fa-solid fa-ellipsis-vertical text-sm"></i>
                </button>
            </div>
        </div>
        <canvas id="salesChart" height="160"></canvas>
    </div>

    {{-- Top Categories --}}
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-base font-bold text-gray-900">Top Categories</h2>
            <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5">
                <span class="text-xs font-medium text-gray-600">Weekly</span>
                <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
            </div>
        </div>

        <div class="flex gap-4 items-center mb-4">
            <div class="relative w-28 h-28 shrink-0">
                <canvas id="donutChart" width="112" height="112"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-lg font-extrabold text-gray-900">1000</span>
                    <span class="text-[10px] text-gray-400">Top Score</span>
                </div>
            </div>
            <div class="flex-1 space-y-3">
                @php
                $cats = [
                    ['name' => 'Electronics', 'sales' => '698 Sales', 'color' => 'bg-gray-800', 'pct' => 70],
                    ['name' => 'Sports',       'sales' => '545 Sales', 'color' => 'bg-orange-400', 'pct' => 55],
                    ['name' => 'Lifestyles',   'sales' => '455 Sales', 'color' => 'bg-cyan-400', 'pct' => 45],
                ];
                @endphp
                @foreach ($cats as $cat)
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="font-semibold text-gray-700">{{ $cat['name'] }}</span>
                        <span class="text-gray-400">{{ $cat['sales'] }}</span>
                    </div>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="{{ $cat['color'] }} h-full rounded-full" style="width:{{ $cat['pct'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="border-t border-gray-100 pt-3 space-y-2">
            <div class="flex items-center justify-between text-xs">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-gray-800 inline-block"></span>
                    <span class="text-gray-500">Total Number of Categories</span>
                </div>
                <span class="font-bold text-gray-800">690</span>
            </div>
            <div class="flex items-center justify-between text-xs">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-400 inline-block"></span>
                    <span class="text-gray-500">Total Number of Products</span>
                </div>
                <span class="font-bold text-gray-800">7899</span>
            </div>
        </div>
    </div>

</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // Sales & Purchase Bar Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const labels = ['2am','4am','6am','8am','10am','12am','14am','16am','18am','20am','22am','24am'];
    new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels,
            datasets: [
                {
                    label: 'Total Purchase',
                    data: [35000, 42000, 38000, 50000, 30000, 45000, 28000, 55000, 60000, 48000, 42000, 38000],
                    backgroundColor: 'rgba(103, 232, 249, 0.35)',
                    borderColor: 'rgba(103, 232, 249, 0.7)',
                    borderWidth: 1,
                    borderRadius: 4,
                    barPercentage: 0.6,
                },
                {
                    label: 'Total Sales',
                    data: [18000, 22000, 15000, 25000, 12000, 20000, 16000, 30000, 28000, 22000, 18000, 20000],
                    backgroundColor: 'rgba(6, 182, 212, 0.85)',
                    borderColor: 'rgba(6, 182, 212, 1)',
                    borderWidth: 1,
                    borderRadius: 4,
                    barPercentage: 0.6,
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#9ca3af' } },
                y: {
                    grid: { color: '#f3f4f6', drawBorder: false },
                    ticks: {
                        font: { size: 11 }, color: '#9ca3af',
                        callback: v => v >= 1000 ? (v/1000)+'K' : v
                    },
                    beginAtZero: true,
                }
            }
        }
    });

    // Donut Chart
    const donutCtx = document.getElementById('donutChart').getContext('2d');
    new Chart(donutCtx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [70, 55, 45],
                backgroundColor: ['#1f2937', '#fb923c', '#22d3ee'],
                borderWidth: 0,
                hoverOffset: 4,
            }]
        },
        options: {
            cutout: '70%',
            plugins: { legend: { display: false }, tooltip: { enabled: false } },
            responsive: false,
        }
    });

    // Tab switcher
    function switchTab(btn, tab) {
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('bg-gray-900', 'text-white', 'border-gray-900');
            b.classList.add('text-gray-500', 'border-gray-200');
        });
        btn.classList.add('bg-gray-900', 'text-white', 'border-gray-900');
        btn.classList.remove('text-gray-500', 'border-gray-200');
    }
</script>

@endsection
