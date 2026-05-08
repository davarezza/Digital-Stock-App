<section class="max-w-7xl mx-auto px-4 py-6 pb-12">

    <div class="flex items-end justify-between mb-6">
        <div>
            <span class="text-xs font-bold text-green-600 uppercase tracking-widest">Terlaris</span>
            <h2 class="text-2xl font-black text-gray-900 mt-0.5">Terlaris di {{ config('app.name') }}</h2>
        </div>
        <a href="{{ route('product-list', ['best_seller' => 1]) }}"
        class="text-sm font-bold text-green-600 hover:text-green-700 flex items-center gap-1 transition">
            Lihat Semua <i class='bx bx-chevron-right'></i>
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach ($products_best as $product)
            @include('partials.product-card', ['product' => $product])
        @endforeach
    </div>

</section>
