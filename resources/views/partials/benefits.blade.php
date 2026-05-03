<section class="max-w-7xl mx-auto px-4 pb-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        @php
        $benefits = [
            ['icon' => 'bx-truck',         'title' => 'Gratis Ongkir',    'desc' => 'Min. order 1 Dus'],
            ['icon' => 'bx-package',       'title' => 'Stok Pabrik',      'desc' => 'Langsung distributor'],
            ['icon' => 'bx-shield-check',  'title' => '100% Original',    'desc' => 'Brand resmi terjamin'],
            ['icon' => 'bx-purchase-tag',  'title' => 'Harga Grosir',     'desc' => 'Hemat hingga 35%'],
        ];
        @endphp

        @foreach ($benefits as $b)
        <div class="bg-white border border-gray-100 rounded-2xl px-5 py-4 flex items-center gap-3 shadow-sm hover:shadow-md hover:border-green-200 transition">
            <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center shrink-0">
                <i class='bx {{ $b["icon"] }} text-green-600 text-xl'></i>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-800">{{ $b['title'] }}</p>
                <p class="text-xs text-gray-500">{{ $b['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
