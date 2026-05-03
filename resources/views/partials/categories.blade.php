<section class="max-w-7xl mx-auto px-4 py-6">

    <div class="flex items-end justify-between mb-6">
        <div>
            <span class="text-xs font-bold text-green-600 uppercase tracking-widest">Kategori Grosir</span>
            <h2 class="text-2xl font-black text-gray-900 mt-0.5">Jelajahi Kategori Populer</h2>
        </div>
        <a href="#" class="text-sm font-bold text-green-600 hover:text-green-700 flex items-center gap-1 transition">
            Lihat Semua <i class='bx bx-chevron-right'></i>
        </a>
    </div>

    @php
    $categories = [
        ['name' => 'Sembako',       'img' => 'https://images.unsplash.com/photo-1585952374253-b5b34fa3fa1c?w=150&q=80'],
        ['name' => 'Minuman',       'img' => 'https://images.unsplash.com/photo-1554866585-cd94860890b7?w=150&q=80'],
        ['name' => 'Mie Instan',    'img' => 'https://images.unsplash.com/photo-1612392062631-a4b38f4a6d3e?w=150&q=80'],
        ['name' => 'Minyak Goreng', 'img' => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=150&q=80'],
        ['name' => 'Snack',         'img' => 'https://images.unsplash.com/photo-1621939514649-280e2ee25f60?w=150&q=80'],
        ['name' => 'Sabun & Deterjen','img'=> 'https://images.unsplash.com/photo-1631390138668-35c5a90c9f04?w=150&q=80'],
        ['name' => 'Tisu & Popok',  'img' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=150&q=80'],
        ['name' => 'Bumbu Dapur',   'img' => 'https://images.unsplash.com/photo-1506368249639-73a05d6f6488?w=150&q=80'],
        ['name' => 'Kopi & Teh',    'img' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=150&q=80'],
        ['name' => 'Susu & Sereal', 'img' => 'https://images.unsplash.com/photo-1523473827533-2a64d0d36748?w=150&q=80'],
        ['name' => 'Personal Care', 'img' => 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?w=150&q=80'],
        ['name' => 'ATK & Kantor',  'img' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?w=150&q=80'],
    ];
    @endphp

    <div class="grid grid-cols-6 md:grid-cols-12 gap-3">
        @foreach ($categories as $cat)
        <a href="#" class="flex flex-col items-center gap-2 group col-span-2 md:col-span-1">
            <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-transparent group-hover:border-green-400 transition shadow-sm group-hover:shadow-md">
                <img src="{{ $cat['img'] }}" alt="{{ $cat['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
            </div>
            <span class="text-xs font-semibold text-gray-700 text-center leading-tight group-hover:text-green-600 transition">{{ $cat['name'] }}</span>
        </a>
        @endforeach
    </div>

</section>
