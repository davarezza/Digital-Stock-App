<div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 overflow-hidden group flex flex-col">
    <div class="relative overflow-hidden bg-gray-50 aspect-square">
        <img
            src="{{ asset('img/products/' . $product->image) }}"
            alt="{{ $product->name }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >
        <button class="absolute top-2.5 right-2.5 w-8 h-8 bg-white/80 backdrop-blur-sm border border-gray-200 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-300 transition shadow-sm">
            <i class='bx bx-heart text-base'></i>
        </button>
    </div>

    <div class="p-4 flex flex-col flex-1">
        <span class="text-[10px] font-black tracking-wider text-green-700 mb-1">{{ $product->category->name ?? '-' }}</span>
        <p class="text-sm font-bold text-gray-800 leading-snug mb-3 flex-1">{{ $product->name }}</p>
        <div class="inline-flex items-center gap-1 bg-orange-50 border border-orange-200 text-orange-700 text-[11px] font-semibold px-2.5 py-1 rounded-full w-fit mb-3">
            <i class='bx bx-package text-xs'></i>
            {{ $product->unit_description }}
        </div>

        <p class="text-lg font-black text-orange-500 mb-1">Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}</p>
    </div>

</div>
