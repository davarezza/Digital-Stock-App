<section class="max-w-7xl mx-auto px-4 py-6">

    <div class="flex items-end justify-between mb-6">
        <div>
            <span class="text-xs font-bold text-green-600 uppercase tracking-widest">Kategori Grosir</span>
            <h2 class="text-2xl font-black text-gray-900 mt-0.5">Jelajahi Kategori Grosir</h2>
        </div>
    </div>
    <div class="grid grid-cols-6 md:grid-cols-12 gap-3">
        @foreach ($categories as $cat)
        <a href="#" class="flex flex-col items-center gap-2 group col-span-2 md:col-span-1">
            <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-transparent group-hover:border-green-400 transition shadow-sm group-hover:shadow-md">
                <img src="{{ asset('img/categories/' . $cat->image) }}" alt="{{ $cat->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
            </div>
            <span class="text-xs font-semibold text-gray-700 text-center leading-tight group-hover:text-green-600 transition">{{ $cat->name }}</span>
        </a>
        @endforeach
    </div>

</section>
