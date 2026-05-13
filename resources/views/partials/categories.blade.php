<section class="max-w-7xl mx-auto px-4 py-6">

    <div class="flex items-end justify-between mb-6">
        <div>
            <span class="text-xs font-bold text-green-600 uppercase tracking-widest">Kategori Grosir</span>
            <h2 class="text-2xl font-black text-gray-900 mt-0.5">Jelajahi Kategori Grosir</h2>
        </div>
    </div>
    <div class="grid grid-cols-6 md:grid-cols-12 gap-3">
        @foreach ($categories as $cat)
            <a href="{{ route('product-list', ['category' => Str::slug($cat->name)]) }}"
            class="flex flex-col items-center gap-2 group col-span-2 md:col-span-1">

                <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 transition
                    {{ request('category') == Str::slug($cat->name) ? 'border-green-600 shadow-md' : 'border-transparent' }}">
                    <img src="{{ asset('img/categories/' . $cat->image) }}" class="w-full h-full object-cover">
                </div>

                <span class="text-xs font-semibold {{ request('category') == Str::slug($cat->name) ? 'text-green-600' : 'text-gray-700' }}">
                    {{ $cat->name }}
                </span>
            </a>
        @endforeach
    </div>

</section>
