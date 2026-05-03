<section class="max-w-7xl mx-auto px-4 py-6 pb-12">

    <div class="flex items-end justify-between mb-6">
        <div>
            <span class="text-xs font-bold text-green-600 uppercase tracking-widest">Terlaris</span>
            <h2 class="text-2xl font-black text-gray-900 mt-0.5">Terlaris di Sembako</h2>
        </div>
        <a href="#" class="text-sm font-bold text-green-600 hover:text-green-700 flex items-center gap-1 transition">
            Lihat Semua <i class='bx bx-chevron-right'></i>
        </a>
    </div>

    @php
    $products = [
        [
            'brand' => 'GULAKU',
            'name'  => 'Gula Pasir 1Kg',
            'qty'   => '1 Dus = 12 Pcs',
            'price' => 'Rp 156.000',
            'rating'=> '4.8',
            'img'   => 'https://images.unsplash.com/photo-1559598467-f8b76c8155d0?w=400&q=80',
        ],
        [
            'brand' => 'SEGITIGA BIRU',
            'name'  => 'Tepung Terigu Serbaguna',
            'qty'   => '1 Dus = 10 Pcs',
            'price' => 'Rp 138.000',
            'rating'=> '4.7',
            'img'   => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400&q=80',
        ],
        [
            'brand' => 'ABC',
            'name'  => 'Saus Sambal Botol 340ml',
            'qty'   => '1 Dus = 12 Pcs',
            'price' => 'Rp 168.000',
            'rating'=> '4.6',
            'img'   => 'https://images.unsplash.com/photo-1603048588665-791ca8aea617?w=400&q=80',
        ],
        [
            'brand' => 'BANGO',
            'name'  => 'Kecap Manis 600ml',
            'qty'   => '1 Dus = 12 Pcs',
            'price' => 'Rp 195.000',
            'rating'=> '4.9',
            'img'   => 'https://images.unsplash.com/photo-1534483509719-3feaee7c30da?w=400&q=80',
        ],
        [
            'brand' => 'CAP KAPAL',
            'name'  => 'Garam Halus Beryodium',
            'qty'   => '1 Dus = 24 Pcs',
            'price' => 'Rp 75.000',
            'rating'=> '4.5',
            'img'   => 'https://images.unsplash.com/photo-1518110925495-5fe2fda0442c?w=400&q=80',
        ],
    ];
    @endphp

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach ($products as $product)
            @include('partials.product-card', ['product' => $product])
        @endforeach
    </div>

</section>
